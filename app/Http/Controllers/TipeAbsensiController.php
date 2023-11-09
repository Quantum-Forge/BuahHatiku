<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAbsensi;
use Illuminate\Support\Facades\Validator;

class TipeAbsensiController extends Controller
{
    //
    public static function view(){
        $tipe_absensies = TipeAbsensi::all();
        return view('tipe_absensi_insert')->with([
            'tipe_absensies' => $tipe_absensies
        ]);
    }

    public static function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'JenisAbsensi' => 'required|unique:tipe_absensi',
            'Harga' => 'required|numeric',
            'Durasi' => 'required|numeric',
            'Keterangan' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'JenisAbsensi.unique' => 'Jenis absensi sudah ada'
        ]);
        if ($validator->fails()) {
            return redirect('/tipe_absensi_insert')
                        ->withErrors($validator)
                        ->withInput();
        }
        $tipe_absensi = new TipeAbsensi;

        $tipe_absensi->JenisAbsensi = $request->JenisAbsensi;
        $tipe_absensi->Keterangan = $request->Keterangan;
        $tipe_absensi->Harga = $request->Harga;
        $tipe_absensi->Durasi = $request->Durasi;
        $tipe_absensi->save();

        return redirect('/tipe_absensi_insert');
    }

    public static function update(Request $request, $IdTipe){
        // dd($IdTipe);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'JenisAbsensi' => 'required|unique:tipe_absensi',
            'Harga' => 'required|numeric',
            'Durasi' => 'required|numeric',
            'Keterangan' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        // dd($validator->errors());
        if ($validator->fails()) {
            return redirect('/tipe_absensi_insert');
        }
        $tipe_absensi = TipeAbsensi::where('IdTipe', $IdTipe)->first();
        $tipe_absensi->JenisAbsensi = $request->JenisAbsensi;
        $tipe_absensi->Keterangan = $request->Keterangan;
        $tipe_absensi->Harga = $request->Harga;
        $tipe_absensi->Durasi = $request->Durasi;
        $tipe_absensi->save();
        return redirect('/tipe_absensi_insert');
    }
}
