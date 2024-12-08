<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    //
    public function showPage($eventId){

        $userId = User::where('email',Session::get('email'))->first()->id;

        $divisionId = Interviewer::where('event_id',$eventId)->where('user_id',$userId)->first()->id;

        $questions = Question::where('division_id',$divisionId)->get();

        return view('interviewer.set_interview_questions', [
            'eventId' => $eventId,
            'questions' => $questions,
        ]);
    }
    public function addQuestion(Request $request, $eventId){

        $validatedData = $request->validate([
            'question' => 'required|max:2048'
        ],[
            'question.required' => 'Pertanyaan Tidak Boleh Kosong',
            'question.max' => 'Pertanyaan Terlalu Panjang'
        ]);

        $userId = User::where('email',Session::get('email'))->first()->id;

        $divisionId = Interviewer::where('event_id',$eventId)->where('user_id',$userId)->first()->id;

        $question = new Question();

        $question->question_content = $validatedData['question'];
        $question->division_id = $divisionId;
        $question->save();

        return redirect("set_interview_question/$eventId")->with('success','Data Berhasil Ditambahkan');
    }
    public function deleteQuestion($eventId, $questionId){
        
        $question = Question::find($questionId);

        $question->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
