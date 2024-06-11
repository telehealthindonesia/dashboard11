<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Questionnaire;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'questionnaire_id'  => 'required',
            'question'          => 'required',
            'tipe_jawaban'      => 'required',
            'bobot'             => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('questionnaire.show', ['id'=>$request->questionnaire_id])
                ->withErrors($validator)
                ->withInput();
        }else{
            $questionnaire = Questionnaire::find($request->questionnaire_id);
            $data_questionnaire = [
                'id'            => $questionnaire->id,
                'judul'         => $questionnaire->judul,
                'creator'       => $questionnaire->creator
            ];
            $data_post = [
                'questionnaire'     => $data_questionnaire,
                'question'          => $request->question,
                'tipe_jawaban'      => $request->tipe_jawaban,
                'bobot'             => (int) $request->bobot,
                'name'              => $request->name,
                'required'          => (boolean) $request->required
            ];
            $qustion    = new Question();
            $create     = $qustion->create($data_post);
            if($create){
                return back()->with('success', 'Data berhasil disimpan');
            }else{
                return back()->with('danger', 'Data gagal disimpan');
            }
        }
    }
}
