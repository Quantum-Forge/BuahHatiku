<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Biodata;
use App\Models\User;
use App\Models\TipeAbsensi;
use App\Models\JadwalRolling;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    //
    public static function view(Request $request){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $tipe_absensies = TipeAbsensi::all();
        $jadwal_rolling = JadwalRolling::query();
        if($request->Tanggal){
            $jadwal_rolling->where('Tanggal', $request->Tanggal);
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
        $jadwal_rolling = $jadwal_rolling->get();
        return view('daftar_absensi')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'jadwal_rolling' => $jadwal_rolling
        ]);
    }

    public static function insert(Request $request){
        $absensi = new Absensi;

        $absensi->IdAnak = $request->IdAnak;
        $absensi->NoIdentitas = $request->NoIdentitas;
        $absensi->IdTipe = $request->IdTipe;
        $absensi->Tanggal = $request->Tanggal;
        $date = Carbon::parse($request->Tanggal)->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        $absensi->Hari = $date->format('l');
        $absensi->Hadir = 0;
        
        $absensi->save();
        return redirect('/daftar_absensi');
    }

    public static function update_status($IdAbsensi){
        $absensi = Absensi::where('IdAbsensi', $IdAbsensi)->first();
        $absensi->Hadir = $absensi->Hadir == 1 ? 0 : 1 ;
        $absensi->save();
        return redirect('daftar_absensi');
    }
}
