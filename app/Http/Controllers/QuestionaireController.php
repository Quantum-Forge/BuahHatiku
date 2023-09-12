<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisQuestionaire;
use App\Models\Questionnaire;

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
        $questionnaire = new Questionnaire;

        $questionnaire->IdJenis = $request->IdJenis;
        $questionnaire->Pertanyaan = $request->Pertanyaan;
        $questionnaire->save();

        return redirect('/questionnaire_insert');
    }

    public static function delete($IdQuestionaire){
        $duestionnaire = Questionnaire::where('IdQuestionaire', $IdQuestionaire)->first();
        $duestionnaire->delete();
        return redirect('/questionnaire_insert');
    }
}
