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
        $biodatas = Biodata::doesnthave('parental_questionnaires')->get();
        $questionnaires = Questionnaire::all();
        $biodatas_filled = Biodata::has('parental_questionnaires')->get();
        return view('parental_questionnaire')->with([
            'biodatas' => $biodatas,
            'questionnaires' => $questionnaires,
            'biodatas_filled' => $biodatas_filled,
        ]);
    }

    public static function view_detail($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        return view('parental_questionnaire_view')->with([
            'biodata' => $biodata
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

    public static function delete($IdAnak){
        $questionnaire = ParentalQuestionnaire::where('IdAnak', $IdAnak)->delete();
        return redirect('/parental_questionnaire');
    }
}
