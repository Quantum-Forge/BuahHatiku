<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        return view('biodataview')->with('biodatas', $biodatas);
    }

    public static function insert(Request $request){
        $biodata = new Biodata;

        $biodata->Nama = $request->Nama;
        $biodata->AnakKe = $request->AnakKe;
        $biodata->JenisKelamin = $request->JenisKelamin;
        $biodata->TglLahir = $request->TglLahir;
        $biodata->TempatLahir = $request->TempatLahir;
        $biodata->Pendidikan = $request->Pendidikan;
        $biodata->IdDiagnosa = $request->Diagnosa;
        $biodata->KeteranganDiagnosa = $request->KeteranganDiagnosa;
        $biodata->YangMendiagnosa = $request->YangMendiagnosa;
        $biodata->NamaBapak = $request->NamaBapak;
        $biodata->NamaIbu = $request->NamaIbu;
        $biodata->PendBapak = $request->PendBapak;
        $biodata->PendIbu = $request->PendIbu;
        $biodata->Alamat = $request->Alamat;
        $biodata->TglLahirOrtu = $request->TglLahirOrtu;
        $biodata->NoHP = $request->NoHP;
        $biodata->Email = $request->Email;

        $biodata->save();
        return redirect('/biodata_insert');
    }

    public static function update_view($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        return view('biodataedit')->with('biodata', $biodata);
    }

    public static function update(Request $request){
        $biodata = Biodata::where('IdAnak', $request->IdAnak)->first();

        $biodata->Nama = $request->Nama;
        $biodata->AnakKe = $request->AnakKe;
        $biodata->JenisKelamin = $request->JenisKelamin;
        $biodata->TglLahir = $request->TglLahir;
        $biodata->TempatLahir = $request->TempatLahir;
        $biodata->Pendidikan = $request->Pendidikan;
        $biodata->IdDiagnosa = $request->Diagnosa;
        $biodata->KeteranganDiagnosa = $request->KeteranganDiagnosa;
        $biodata->YangMendiagnosa = $request->YangMendiagnosa;
        $biodata->NamaBapak = $request->NamaBapak;
        $biodata->NamaIbu = $request->NamaIbu;
        $biodata->PendBapak = $request->PendBapak;
        $biodata->PendIbu = $request->PendIbu;
        $biodata->Alamat = $request->Alamat;
        $biodata->TglLahirOrtu = $request->TglLahirOrtu;
        $biodata->NoHP = $request->NoHP;
        $biodata->Email = $request->Email;

        $biodata->save();
        return redirect('/biodata_view');
    }

    public static function delete($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        $biodata->delete();
        return redirect('/biodata_view');
    }
}
