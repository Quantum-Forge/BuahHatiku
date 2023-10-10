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

class AbsensiController extends Controller
{
    //
    public static function view_kehadiran(){
        $jadwal_rolling = JadwalRolling::all();
        return view('kehadiran')->with([
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
        $jadwal_rolling = JadwalRolling::query();
        if($request->Tanggal || $request->IdAnak || $request->NoIdentitas || $request->IdTipe){
            if($request->Tanggal){
                $jadwal_rolling->whereDate('Tanggal', Carbon::createFromFormat('d/m/Y',$request->Tanggal)->toDateString());
            }
            if($request->IdAnak){
                $jadwal_rolling->where('IdAnak', $request->IdAnak);
            }
            if($request->NoIdentitas){
                $jadwal_rolling->where('NoIdentitas', $request->NoIdentitas);
            }
            if($request->IdTipe){
                $jadwal_rolling->where('IdTipe', $request->IdTipe);
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

    public static function update(Request $request){
        if($request->absensi){
            foreach($request->absensi as $IdAbsensi){
                $absensi = Absensi::find($IdAbsensi);
                $absensi->Hadir = $request->hadir[$IdAbsensi];
                $absensi->Alasan = $request->keterangan[$IdAbsensi];
                $absensi->save();
            }
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
