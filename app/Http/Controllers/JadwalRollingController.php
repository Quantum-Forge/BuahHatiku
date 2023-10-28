<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;
use App\Models\User;
use App\Models\TipeAbsensi;
use App\Models\JadwalRolling;
use App\Models\Absensi;
use Carbon\Carbon;
use GuzzleHttp\Client;
use DB;

class JadwalRollingController extends Controller
{
    //
    public static function view(){
        $jadwal_rolling = JadwalRolling::orderBy('Tanggal', 'ASC')->orderBy('WaktuMulai', 'ASC')->get();
        return view('jadwal_rolling_view')->with([
            'jadwal_rolling' => $jadwal_rolling,
        ]);
    }

    public static function view_table(){
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data = [];
        foreach($hari as $hari_item){
            $query = DB::select('
                WITH RECURSIVE jadwal_interval as (
                    SELECT DISTINCT users.Nama as Terapis, biodata.Nama as Anak, HOUR(TIMEDIFF(WaktuSelesai, WaktuMulai)) as hour_diff, WaktuMulai, ADDTIME(WaktuMulai, "1:00:00") as WaktuSelesai
                    FROM jadwal_rolling
                        JOIN users ON jadwal_rolling.NoIdentitas = users.NoIdentitas
                        JOIN biodata ON jadwal_rolling.IdAnak = biodata.IdAnak
                    WHERE Hari = "'.$hari_item.'"
                    UNION ALL
                    SELECT Terapis, Anak, hour_diff-1, ADDTIME(WaktuMulai, "1:00:00"), ADDTIME(WaktuSelesai, "1:00:00")
                    FROM jadwal_interval
                    WHERE hour_diff > 1
                ), dim_time as (
                    SELECT "08:00:00" as WaktuMulai, "09:00:00" as WaktuSelesai UNION ALL
                    SELECT "09:00:00" as WaktuMulai, "10:00:00" as WaktuSelesai UNION ALL
                    SELECT "10:00:00" as WaktuMulai, "11:00:00" as WaktuSelesai UNION ALL
                    SELECT "11:00:00" as WaktuMulai, "12:00:00" as WaktuSelesai UNION ALL
                    SELECT "12:00:00" as WaktuMulai, "13:00:00" as WaktuSelesai UNION ALL
                    SELECT "13:00:00" as WaktuMulai, "14:00:00" as WaktuSelesai UNION ALL
                    SELECT "14:00:00" as WaktuMulai, "15:00:00" as WaktuSelesai UNION ALL
                    SELECT "15:00:00" as WaktuMulai, "16:00:00" as WaktuSelesai UNION ALL
                    SELECT "16:00:00" as WaktuMulai, "17:00:00" as WaktuSelesai
                ), dim_terapis as (
                    SELECT users.Nama as Terapis, JenisAbsensi
                    FROM users
                        LEFT JOIN tipe_absensi ON users.IdTipe = tipe_absensi.IdTipe
                    WHERE Role = 3
                ), dim as (
                    SELECT WaktuMulai, WaktuSelesai, Terapis, JenisAbsensi
                    FROM dim_time
                        CROSS JOIN dim_terapis
                )
                SELECT 
                    CONCAT(dim.WaktuMulai, " - ", dim.WaktuSelesai) as Waktu, dim.Terapis, dim.JenisAbsensi, Anak
                FROM dim 
                    LEFT JOIN jadwal_interval
                    ON dim.WaktuMulai = jadwal_interval.WaktuMulai
                        AND dim.WaktuSelesai = jadwal_interval.WaktuSelesai
                        AND dim.Terapis = jadwal_interval.Terapis
                ORDER BY Waktu, FIELD(JenisAbsensi, "ABA", "TW", "OT"), dim.Terapis
            ');
            array_push($data, collect($query)->groupBy('Waktu'));
        }
        
        // foreach ($senin as $waktu => $group) {
        //     echo "$waktu: ";
        
        //     foreach ($group as $item) {
        //         echo $item->Anak.'|';
        //     }
        //     echo "\n";
        // }
        return view('jadwal_rolling_view')->with([
            'data' => $data
        ]);
    }

    public static function crud_view(){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $user = Auth::user();
        if($user->Role == 3){
            $terapises = User::where('NoIdentitas', $user->NoIdentitas)->get();
        }
        $tipe_absensies = TipeAbsensi::all();
        $jadwal_rolling = JadwalRolling::whereHas('absensi',function($q) {
            $q->whereColumn('created_at', '>=', 'updated_at');
        })->get();
        return view('jadwal_rolling')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'jadwal_rolling' => $jadwal_rolling,
        ]);
    }

    public static function filterHolidays($dates)
    {
        $client = new Client();
        $response = $client->get('https://api-harilibur.vercel.app/api');
        $holidays = json_decode($response->getBody(), true);

        $next_year = Carbon::now()->year+1;
        $response = $client->get('https://api-harilibur.vercel.app/api?year='.$next_year);
        $holidays = array_merge($holidays, json_decode($response->getBody(), true));
        
        $holidays = array_filter($holidays, function ($holiday) {
            return $holiday['is_national_holiday'] == true;
        });
        $holiday_dates = [];
        foreach ($holidays as $item) {
            if (isset($item['holiday_date'])) {
                $holiday_dates[] = $item['holiday_date'];
            }
        }
        $dates = array_filter($dates, function ($item) use ($holiday_dates) {
            return !in_array($item['Tanggal'], $holiday_dates);
        });

        return $dates;
    }

    public static function insert(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'Tanggal' => 'required',
            'NoIdentitas' => 'required',
            'IdAnak' => 'required',
            'Hari' => 'required',
            'WaktuMulai' => 'required',
            'WaktuSelesai' => 'required',
            'NoIdentitas.*' => 'required',
            'IdAnak.*' => 'required',
            'Hari.*' => 'required',
            'WaktuMulai.*' => 'required|date_format:H:i',
            'WaktuSelesai.*' => 'required|date_format:H:i|after:WaktuMulai.*',
            // 'WaktuMulai.*' => 'required_with:Hari.*|date_format:H:i',
            // 'WaktuSelesai.*' => 'required_with:Hari.*|date_format:H:i|after:WaktuMulai.0',
        ], [
            'required' => ':attribute harus diisi',
            'NoIdentitas.required' => 'Terapis harus diisi',
            'IdAnak.required' => 'Anak harus diisi',
            'NoIdentitas.*.required' => 'Terapis harus diisi',
            'IdAnak.*.required' => 'Anak harus diisi',
            'WaktuMulai.*.required' => 'Waktu mulai harus diisi',
            'WaktuSelesai.*.required' => 'Waktu selesai harus diisi',
            'WaktuMulai.*.required_with' => 'Waktu mulai harus diisi',
            'WaktuSelesai.*.required_with' => 'Waktu selesai harus diisi',
            'WaktuSelesai.*.after' => 'Waktu selesai harus setelah waktu mulai',
        ]);
        // dd($validator->errors());
        if ($validator->fails()) {
            return redirect('/jadwal_rolling')
                        ->withErrors($validator)
                        ->withInput();
        }
        $master_jadwal = [];
        for($i=0; $i<count($request->Hari); $i++){
            array_push($master_jadwal, [
                'Hari' => $request->Hari[$i],
                'WaktuMulai' => $request->WaktuMulai[$i],
                'WaktuSelesai' => $request->WaktuSelesai[$i],
                'NoIdentitas' => $request->NoIdentitas[$i],
                'IdAnak' => $request->IdAnak[$i],
            ]);
        }
        $master_jadwal = collect($master_jadwal)->groupBy('Hari');
        
        $tanggal = explode(" - ", $request->Tanggal);
        $startDate = Carbon::createFromFormat('d/m/Y',$tanggal[0]); 
        $endDate = Carbon::createFromFormat('d/m/Y',$tanggal[1]);
        $dates = [];
        
        while ($startDate->lte($endDate)) {
            array_push($dates, [
                'Tanggal' => $startDate->toDateString(),
                'Hari' => $startDate->locale('id')->dayName,
            ]);
            // if ( isset($request->Hari[0]) && $startDate->isMonday()) {
            //     array_push($dates, [
            //         'Tanggal' => $startDate->toDateString(),
            //         'Hari' => $request->Hari[0],
            //         'WaktuMulai' => $request->WaktuMulai[0],
            //         'WaktuSelesai' => $request->WaktuSelesai[0],

            //     ]);
            // } 
            $startDate->addDay(); // Move to the next day
        }
        $dates = JadwalRollingController::filterHolidays($dates);
        
        // Check JadwalRolling pernah diinput atau tidak
        foreach($dates as $date){
            if(isset($master_jadwal[$date['Hari']])){
                $jadwal_hari = $master_jadwal[$date['Hari']];
                foreach($jadwal_hari as $data){
                    // check jadwal duplikat
                    $IdTipe = User::find($data['NoIdentitas'])->IdTipe;
                    $check = JadwalRolling::where('IdAnak', $data['IdAnak'])
                        ->where('NoIdentitas', $data['NoIdentitas'])
                        ->where('IdTipe', $IdTipe)
                        ->where('Tanggal', $date['Tanggal'])
                        ->where('WaktuMulai', $data['WaktuMulai'])
                        ->where('WaktuSelesai', $data['WaktuSelesai'])
                        ->first();
                    if(!$check){
                        // insert jadwal
                        $jadwal = new JadwalRolling;

                        $jadwal->IdAnak = $data['IdAnak'];
                        $jadwal->NoIdentitas = $data['NoIdentitas'];
                        $jadwal->IdTipe = $IdTipe;
                        $jadwal->Tanggal = $date['Tanggal'];
                        $jadwal->Hari = $date['Hari'];
                        $jadwal->WaktuMulai = $data['WaktuMulai'];
                        $jadwal->WaktuSelesai = $data['WaktuSelesai'];
                        $jadwal->save();

                        $absensi = new Absensi;
                        $absensi->IdJadwal = $jadwal->IdJadwal;
                        $absensi->Hadir = 0;
                        $absensi->save();
                    }
                }
            }
            
        }

        return redirect('/jadwal_rolling');
    }

    public static function edit_view($IdJadwal){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $user = Auth::user();
        if($user->Role == 3){
            $terapises = User::where('NoIdentitas', $user->NoIdentitas)->get();
        }
        $tipe_absensies = TipeAbsensi::all();
        $jadwal_rolling = JadwalRolling::find($IdJadwal);
        return view('jadwal_rolling_edit')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'jadwal_rolling' => $jadwal_rolling,
        ]);
    }

    public static function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'NoIdentitas' => 'required',
            'IdAnak' => 'required',
            'IdTipe' => 'required',
            'Tanggal' => 'required',
            'WaktuMulai' => 'required',
            'WaktuSelesai' => 'required|after:WaktuMulai',
        ], [
            'required' => ':attribute harus diisi',
            'NoIdentitas.required' => 'Terapis harus diisi',
            'IdAnak.required' => 'Anak harus diisi',
            'IdTipe.required' => 'Tipe absensi harus diisi',
            'WaktuSelesai.after' => 'Waktu selesai harus setelah waktu mulai'
        ]);
        if ($validator->fails()) {
            return redirect('/jadwal_rolling_edit/'.$request->IdJadwal)
                        ->withErrors($validator)
                        ->withInput();
        }
        $tanggal = Carbon::createFromFormat('d/m/Y',$request->Tanggal);
        // $waktuMulai = Carbon::createFromFormat('g:i a',$request->WaktuMulai)->format('H:i');
        // $waktuSelesai = Carbon::createFromFormat('g:i a',$request->WaktuSelesai)->format('H:i');
        $check = JadwalRolling::where('IdAnak', $request->IdAnak)
                ->where('NoIdentitas', $request->NoIdentitas)
                ->where('IdTipe', $request->IdTipe)
                ->where('Tanggal', $tanggal->toDateString())
                ->where('WaktuMulai', $request->WaktuMulai)
                ->where('WaktuSelesai', $request->WaktuSelesai)
                ->first();
        if($check){
            return redirect('/jadwal_rolling_edit/'.$request->IdJadwal)
                        ->withErrors(['message' => 'JadwalRolling sudah pernah diinput'])
                        ->withInput();
        }
        $jadwal = JadwalRolling::find($request->IdJadwal);

        $jadwal->IdAnak = $request->IdAnak;
        $jadwal->NoIdentitas = $request->NoIdentitas;
        $jadwal->IdTipe = $request->IdTipe;
        $jadwal->Tanggal = $tanggal;
        $date = $tanggal->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        $jadwal->Hari = $date->format('l');
        $jadwal->WaktuMulai = $request->WaktuMulai;
        $jadwal->WaktuSelesai = $request->WaktuSelesai;

        $jadwal->save();

        return redirect('/jadwal_rolling');
    }

    public static function delete($IdJadwal){
        $jadwal_rolling = JadwalRolling::where('IdJadwal', $IdJadwal)->first();
        $absensi = Absensi::where('IdJadwal', $IdJadwal)->first();
        $absensi->delete();
        $jadwal_rolling->delete();
        return redirect('/jadwal_rolling');
    }

    public static function delete_bulk(Request $request){
        if($request->Delete){
            $jadwal_rolling = JadwalRolling::whereIn('IdJadwal', $request->Delete);
            Absensi::whereIn('IdJadwal', $jadwal_rolling->get()->modelKeys())->delete();
            $jadwal_rolling->delete();
        }
        return redirect('/jadwal_rolling');
    }

    public static function quit(Request $request){
        $validator = Validator::make($request->all(), [
            'NoIdentitasDelete' => 'required',
            'IdAnakDelete' => 'required',
            'IdTipeDelete' => 'required',
            'TanggalDelete' => 'required',
        ], [
            'TanggalDelete.required' => 'Tanggal Berhenti harus diisi',
            'NoIdentitasDelete.required' => 'Terapis harus diisi',
            'IdAnakDelete.required' => 'Anak harus diisi',
            'IdTipeDelete.required' => 'Tipe absensi harus diisi',
        ]);
        if ($validator->fails()) {
            return redirect('/jadwal_rolling')
                        ->withErrors($validator)
                        ->withInput();
        }
        $tanggal = Carbon::createFromFormat('d/m/Y',$request->TanggalDelete);
        $jadwal_rolling = JadwalRolling::
            whereDate('Tanggal', '>=', $tanggal)
            ->where('IdAnak', $request->IdAnakDelete)
            ->where('NoIdentitas', $request->NoIdentitasDelete)
            ->where('IdTipe', $request->IdTipeDelete);

        Absensi::whereIn('IdJadwal', $jadwal_rolling->get()->modelKeys())->delete();
        $jadwal_rolling->delete();
        
        return redirect('/jadwal_rolling');
    }
}
