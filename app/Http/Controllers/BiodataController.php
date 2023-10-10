<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BiodataController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        return view('biodataview')->with('biodatas', $biodatas);
    }

    public static function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
            'AnakKe' => 'required|numeric',
            'JenisKelamin' => 'required',
            'TglLahir' => 'required',
            'TempatLahir' => 'required',
            'Pendidikan' => 'required',
            'Diagnosa' => 'required',
            'YangMendiagnosa' => 'required',
            'NamaBapak' => 'required',
            'NamaIbu' => 'required',
            'PendBapak' => 'required',
            'PendIbu' => 'required',
            'Alamat' => 'required',
            'TglLahirOrtu' => 'required',
            'NoHP' => 'required|numeric',
            'Email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return redirect('/biodata_insert')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $biodata = new Biodata;

        $biodata->Nama = $request->Nama;
        $biodata->AnakKe = $request->AnakKe;
        $biodata->JenisKelamin = $request->JenisKelamin;
        $biodata->TglLahir = Carbon::createFromFormat('d/m/Y',$request->TglLahir);
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
        $biodata->TglLahirOrtu = Carbon::createFromFormat('d/m/Y',$request->TglLahirOrtu);
        $biodata->NoHP = $request->NoHP;
        $biodata->Email = $request->Email;
        $biodata->TglMasuk = Carbon::now();

        if(!empty($request->file('photo'))){
            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('photos/', $imageName);
            $biodata->Photo = 'photos/'.$imageName;
        }

        $biodata->save();
        return redirect('/biodata_view');
    }

    public static function update_view($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        return view('biodataedit')->with('biodata', $biodata);
    }

    public static function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
            'AnakKe' => 'required|numeric',
            'JenisKelamin' => 'required',
            'TglLahir' => 'required',
            'TempatLahir' => 'required',
            'Pendidikan' => 'required',
            'Diagnosa' => 'required',
            'YangMendiagnosa' => 'required',
            'NamaBapak' => 'required',
            'NamaIbu' => 'required',
            'PendBapak' => 'required',
            'PendIbu' => 'required',
            'Alamat' => 'required',
            'TglLahirOrtu' => 'required',
            'NoHP' => 'required|numeric',
            'Email' => 'required|email',
            'TanggalMasuk' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return redirect('/biodata_edit/'.$request->IdAnak)
                        ->withErrors($validator)
                        ->withInput();
        }
        $biodata = Biodata::where('IdAnak', $request->IdAnak)->first();

        $biodata->Nama = $request->Nama;
        $biodata->AnakKe = $request->AnakKe;
        $biodata->JenisKelamin = $request->JenisKelamin;
        $biodata->TglLahir = Carbon::createFromFormat('d/m/Y',$request->TglLahir);
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
        $biodata->TglLahirOrtu = Carbon::createFromFormat('d/m/Y',$request->TglLahirOrtu);
        $biodata->NoHP = $request->NoHP;
        $biodata->Email = $request->Email;
        $biodata->TglMasuk = Carbon::createFromFormat('d/m/Y',$request->TanggalMasuk);

        if(!empty($request->file('photo'))){
            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('photos/', $imageName);
            $biodata->Photo = 'photos/'.$imageName;
        }

        $biodata->save();
        return redirect('/biodata_view');
    }

    public static function delete($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        $biodata->delete();
        return redirect('/biodata_view');
    }

    public static function search($request){
        $biodatas = Biodata::where('Nama', 'LIKE', '%'.$request->Nama.'%')->get();
        return view('search')->with('biodatas', $biodatas);
    }
}
