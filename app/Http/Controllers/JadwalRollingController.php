<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Biodata;
use App\Models\User;
use App\Models\TipeAbsensi;
use App\Models\JadwalRolling;

class JadwalRollingController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        $terapises = User::where('Role', 3)->get();
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
            'WaktuSelesai' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'NoIdentitas.required' => 'Terapis harus diisi',
            'IdAnak.required' => 'Anak harus diisi',
            'IdTipe.required' => 'Tipe absensi harus diisi',
        ]);
        if ($validator->fails()) {
            return redirect('/jadwal_rolling')
                        ->withErrors($validator)
                        ->withInput();
        }
        $jadwal = new JadwalRolling;

        $jadwal->IdAnak = $request->IdAnak;
        $jadwal->NoIdentitas = $request->NoIdentitas;
        $jadwal->IdTipe = $request->IdTipe;
        $jadwal->Tanggal = $request->Tanggal;
        $jadwal->WaktuMulai = $request->WaktuMulai;
        $jadwal->WaktuSelesai = $request->WaktuSelesai;

        $jadwal->save();
        return redirect('/jadwal_rolling');
    }
}
