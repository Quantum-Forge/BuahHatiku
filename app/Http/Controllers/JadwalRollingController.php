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

class JadwalRollingController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $user = Auth::user();
        if($user->Role == 3){
            $terapises = User::where('NoIdentitas', $user->NoIdentitas)->get();
        }
        $tipe_absensies = TipeAbsensi::all();
        return view('jadwal_rolling')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
        ]);
    }

    public static function insert(Request $request){
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
            return redirect('/jadwal_rolling')
                        ->withErrors($validator)
                        ->withInput();
        }
        $tanggal = Carbon::createFromFormat('d/m/Y',$request->Tanggal);
        $waktuMulai = Carbon::createFromFormat('g:i a',$request->WaktuMulai)->format('H:i');
        $waktuSelesai = Carbon::createFromFormat('g:i a',$request->WaktuSelesai)->format('H:i');
        $check = JadwalRolling::where('IdAnak', $request->IdAnak)
                ->where('NoIdentitas', $request->NoIdentitas)
                ->where('IdTipe', $request->IdTipe)
                ->where('Tanggal', $tanggal->toDateString())
                ->where('WaktuMulai', $waktuMulai)
                ->where('WaktuSelesai', $waktuSelesai)
                ->first();
        if($check){
            return redirect('/jadwal_rolling')
                        ->withErrors(['message' => 'JadwalRolling sudah pernah diinput'])
                        ->withInput();
        }
        $jadwal = new JadwalRolling;

        $jadwal->IdAnak = $request->IdAnak;
        $jadwal->NoIdentitas = $request->NoIdentitas;
        $jadwal->IdTipe = $request->IdTipe;
        $jadwal->Tanggal = $tanggal;
        $date = $tanggal->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        $jadwal->Hari = $date->format('l');
        $jadwal->WaktuMulai = $waktuMulai;
        $jadwal->WaktuSelesai = $waktuSelesai;

        $jadwal->save();

        $absensi = new Absensi;
        $absensi->IdJadwal = $jadwal->IdJadwal;
        $absensi->Hadir = 0;
        $absensi->save();

        return redirect('/jadwal_rolling');
    }
}
