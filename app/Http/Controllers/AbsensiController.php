<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Biodata;
use App\Models\User;
use App\Models\TipeAbsensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        $tipe_absensies = TipeAbsensi::all();
        $absensies = Absensi::all();
        return view('daftar_absensi')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
            'tipe_absensies' => $tipe_absensies,
            'absensies' => $absensies
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
