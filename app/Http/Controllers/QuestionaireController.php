<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisQuestionaire;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Validator;

class QuestionaireController extends Controller
{
    //
    public static function view(){
        $jenis_questionaires = JenisQuestionaire::all();
        $questionnaires = Questionnaire::all();
        return view('questionnaire_insert')->with([
            'jenis_questionaires' => $jenis_questionaires,
            'questionnaires' => $questionnaires
        ]);
    }

    public static function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'IdJenis' => 'required',
            'Pertanyaan' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return redirect('/questionnaire_insert')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $questionnaire = new Questionnaire;

        $questionnaire->IdJenis = $request->IdJenis;
        $questionnaire->Pertanyaan = $request->Pertanyaan;
        $questionnaire->save();

        return redirect('/questionnaire_insert');
    }

    public static function edit(Request $request, $IdQuestionaire){
        $validator = Validator::make($request->all(), [
            'IdJenis' => 'required',
            'Pertanyaan' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return redirect('/questionnaire_insert');
        }
        $questionnaire = Questionnaire::where('IdQuestionaire', $IdQuestionaire)->first();
        $questionnaire->IdJenis = $request->IdJenis;
        $questionnaire->Pertanyaan = $request->Pertanyaan;
        $questionnaire->save();
        return redirect('/questionnaire_insert');
    }

    public static function delete($IdQuestionaire){
        $questionnaire = Questionnaire::where('IdQuestionaire', $IdQuestionaire)->first();
        $questionnaire->delete();
        return redirect('/questionnaire_insert');
    }
}
