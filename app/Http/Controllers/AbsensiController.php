<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Biodata;
use App\Models\User;
use App\Models\TipeAbsensi;
use App\Models\JadwalRolling;
use Carbon\Carbon;
use DB;

class AbsensiController extends Controller
{
    //
    public static function view_kehadiran(Request $request){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $user = Auth::user();
        if($user->Role == 3){
            $terapises = User::where('NoIdentitas', $user->NoIdentitas)->get();
        }
        $tipe_absensies = TipeAbsensi::all();
        $jadwal_rolling = null;
        if($request->Tanggal || $request->IdAnak || $request->NoIdentitas || $request->IdTipe){
            $jadwal_rolling = DB::table('jadwal_rolling')
                ->join('biodata', 'jadwal_rolling.IdAnak', '=', 'biodata.IdAnak')
                ->join('users', 'jadwal_rolling.NoIdentitas', '=', 'users.NoIdentitas')
                ->join('tipe_absensi', 'jadwal_rolling.IdTipe', '=', 'tipe_absensi.IdTipe')
                ->join('absensi', 'jadwal_rolling.IdJadwal', '=', 'absensi.IdJadwal')
                ->select('jadwal_rolling.*', 'users.Nama as Terapis', 'biodata.Nama as Anak', 'tipe_absensi.JenisAbsensi', 'IdAbsensi', 'Hadir', 'Alasan');
            if($request->Tanggal){
                $tanggal = explode(" - ", $request->Tanggal);
                $jadwal_rolling->whereBetween('Tanggal', [
                    Carbon::createFromFormat('d/m/Y',$tanggal[0])->toDateString(), 
                    Carbon::createFromFormat('d/m/Y',$tanggal[1])->toDateString()
                ]);
                // $jadwal_rolling->whereDate('Tanggal', Carbon::createFromFormat('d/m/Y',$request->Tanggal)->toDateString());
            }
            if($request->IdAnak){
                $jadwal_rolling->where('jadwal_rolling.IdAnak', $request->IdAnak);
            }
            if($request->NoIdentitas){
                $jadwal_rolling->where('jadwal_rolling.NoIdentitas', $request->NoIdentitas);
            }
            if($request->IdTipe){
                $jadwal_rolling->where('jadwal_rolling.IdTipe', $request->IdTipe);
            }
            if($request->WaktuMulai){
                $waktu = Carbon::createFromFormat('g:i a',$request->WaktuMulai)->format('H:i');
                $jadwal_rolling->where('WaktuMulai', '>=', $waktu);
            }
            $jadwal_rolling = $jadwal_rolling->get();
        }
        return view('kehadiran')->with([
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'jadwal_rolling' => $jadwal_rolling
        ]);
    }

    public static function view(Request $request){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $user = Auth::user();
        if($user->Role == 3){
            $terapises = User::where('NoIdentitas', $user->NoIdentitas)->get();
        }
        $tipe_absensies = TipeAbsensi::all();
        $jadwal_rolling = null;
        if($request->Tanggal || $request->IdAnak || $request->NoIdentitas || $request->IdTipe){
            $jadwal_rolling = DB::table('jadwal_rolling')
                ->join('biodata', 'jadwal_rolling.IdAnak', '=', 'biodata.IdAnak')
                ->join('users', 'jadwal_rolling.NoIdentitas', '=', 'users.NoIdentitas')
                ->join('tipe_absensi', 'jadwal_rolling.IdTipe', '=', 'tipe_absensi.IdTipe')
                ->join('absensi', 'jadwal_rolling.IdJadwal', '=', 'absensi.IdJadwal')
                ->select('jadwal_rolling.*', 'users.Nama as Terapis', 'biodata.Nama as Anak', 'tipe_absensi.JenisAbsensi', 'IdAbsensi', 'Hadir', 'Alasan');
            if($request->Tanggal){
                $tanggal = explode(" - ", $request->Tanggal);
                $jadwal_rolling->whereBetween('Tanggal', [
                    Carbon::createFromFormat('d/m/Y',$tanggal[0])->toDateString(), 
                    Carbon::createFromFormat('d/m/Y',$tanggal[1])->toDateString()
                ]);
                // $jadwal_rolling->whereDate('Tanggal', Carbon::createFromFormat('d/m/Y',$request->Tanggal)->toDateString());
            }
            if($request->IdAnak){
                $jadwal_rolling->where('jadwal_rolling.IdAnak', $request->IdAnak);
            }
            if($request->NoIdentitas){
                $jadwal_rolling->where('jadwal_rolling.NoIdentitas', $request->NoIdentitas);
            }
            if($request->IdTipe){
                $jadwal_rolling->where('jadwal_rolling.IdTipe', $request->IdTipe);
            }
            if($request->WaktuMulai){
                $waktu = Carbon::createFromFormat('g:i a',$request->WaktuMulai)->format('H:i');
                $jadwal_rolling->where('WaktuMulai', '>=', $waktu);
            }
            $jadwal_rolling = $jadwal_rolling->get();
        }
        
        return view('daftar_absensi')->with([
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'jadwal_rolling' => $jadwal_rolling
        ]);
    }

    public static function view_terapis(){
        $user = Auth::user();
        $today = Carbon::now();
        $threeDaysAgo = $today->copy()->subDays(3);
        $jadwal_rolling = DB::table('jadwal_rolling')
            ->join('biodata', 'jadwal_rolling.IdAnak', '=', 'biodata.IdAnak')
            ->join('users', 'jadwal_rolling.NoIdentitas', '=', 'users.NoIdentitas')
            ->join('tipe_absensi', 'jadwal_rolling.IdTipe', '=', 'tipe_absensi.IdTipe')
            ->join('absensi', 'jadwal_rolling.IdJadwal', '=', 'absensi.IdJadwal')
            ->select('jadwal_rolling.*', 'users.Nama as Terapis', 'biodata.Nama as Anak', 'tipe_absensi.JenisAbsensi', 'IdAbsensi', 'Hadir', 'Alasan')
            ->whereBetween('Tanggal', [$threeDaysAgo, $today])
            ->where('jadwal_rolling.NoIdentitas', $user->NoIdentitas)
            ->get();
        return view('daftar_absensi_terapis')->with([
            'jadwal_rolling' => $jadwal_rolling
        ]);
    }

    public static function update(Request $request){
        if($request->absensi){
            foreach($request->absensi as $IdAbsensi){
                $absensi = Absensi::find($IdAbsensi);
                $absensi->Hadir = $request->hadir[$IdAbsensi];
                $absensi->Alasan = $request->keterangan[$IdAbsensi];
                $absensi->save();
            }
        }
        if(Auth::user()->Role==3){
            return redirect('daftar_absensi_terapis');
        }
        return redirect('/daftar_absensi');
    }

    public static function update_status($IdAbsensi){
        $absensi = Absensi::where('IdAbsensi', $IdAbsensi)->first();
        $absensi->Hadir = $absensi->Hadir == 1 ? 0 : 1 ;
        $absensi->save();
        return redirect('daftar_absensi');
    }
}
