<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\ParentalQuestionnaire;
use App\Models\Biodata;

class ParentalQuestionaireController extends Controller
{
    //
    public static function view(){
        $biodatas = Biodata::all();
        $questionnaires = Questionnaire::all();
        return view('parental_questionnaire')->with([
            'biodatas' => $biodatas,
            'questionnaires' => $questionnaires
        ]);
    }
    
    public static function insert(Request $request){
        foreach($request->questionnaire as $IdQuestionaire){
            $parentalQuestionnaire = new ParentalQuestionnaire;
            $parentalQuestionnaire->IdAnak = $request->IdAnak;
            $parentalQuestionnaire->IdQuestionaire = $IdQuestionaire;
            $parentalQuestionnaire->Jawaban = $request->answer[$IdQuestionaire];

            $parentalQuestionnaire->save();
        }
        return redirect('/parental_questionnaire');
    }
}
