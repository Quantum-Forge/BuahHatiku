<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\User;
use App\Models\JadwalRolling;

class JadwalRollingController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
        return view('jadwal_rolling')->with([
            'biodatas' => $biodatas,
            'terapises' => $terapises,
        ]);
    }

    public static function insert(Request $request){
        $jadwal = new JadwalRolling;

        $jadwal->IdAnak = $request->IdAnak;
        $jadwal->NoIdentitas = $request->NoIdentitas;
        $jadwal->Tanggal = $request->Tanggal;
        $jadwal->WaktuMulai = $request->WaktuMulai;
        $jadwal->WaktuSelesai = $request->WaktuSelesai;

        $jadwal->save();
        return redirect('/jadwal_rolling');
    }
}
