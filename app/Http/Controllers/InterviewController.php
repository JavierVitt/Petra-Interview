<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Event;
use App\Models\Division;
use App\Models\Question;
use App\Models\Interview;
use App\Models\Interviewer;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AvailableInterviewSchedule;

class InterviewController extends Controller
{
    //
    public function show()
    {
        $userEmail = Session::get('email');

        $userId = User::where('email', $userEmail)->first()->id;

        $divisions = Interviewer::where('user_id', $userId)->get();

        $list = [];

        // dd($divisions);

        foreach ($divisions as $division) {
            $event = Division::where('id', $division->division_id)->get();
            // dd($event[0]['event_id']);
            array_push($list, $event[0]['event_id']);
        }

        $events = Event::whereIn('id', $list)->where('status',1)->distinct()->orderBy('recruitment_end_date')->get();

        return view('interviewer/manage_interview', ['events' => $events]);
    }
    public function showDetails(Event $eventId)
    {
        $eventId = $eventId->id;
        $userEmail = Session::get('email');

        $interviewerId = User::where('email', $userEmail)->first()->id;

        // Foto, Interviewee, Jadwal(Tanggal dan Jam), Lokasi, KHS, SKKK

        $registrations = Registration::where('interviewer_id', $interviewerId)->where('event_id',$eventId)->get();


        $registrationId = [];
        $fotos = [];
        $interviewees = [];
        $intervieweesId = [];
        $jadwals = [];
        $locations = [];
        $statuss = [];
        $khss = [];
        $skkks = [];

        foreach ($registrations as $registration) {

            $dataUser = User::where('id', $registration->user_id)->first();
            $dataInterviewee = User::where('id', $registration->user_id)->first();
            $jadwalInterview = AvailableInterviewSchedule::where('id', $registration->available_interview_id)->first();
            $jadwalText = $jadwalInterview->interview_date . ", " . $jadwalInterview->interview_time;
            $location = $jadwalInterview->interview_location;
            $status = $registration->status;
            $khs = $registration->khs;
            $skkk = $registration->skkk;

            array_push($registrationId, $registration->id);
            array_push($fotos, $dataUser->profile_picture);
            array_push($intervieweesId, $dataInterviewee->id);
            array_push($interviewees, $dataUser->name);
            array_push($jadwals, $jadwalText);
            array_push($locations, $location);
            array_push($statuss, $status);
            array_push($khss, $khs);
            array_push($skkks, $skkk);
        }

        return view('interviewer/manage_interview_details', [
            'eventId' => $eventId,
            'fotos' => $fotos,
            'interviewees' => $interviewees,
            'jadwals' => $jadwals,
            'khss' => $khss,
            'skkks' => $skkks,
            'registrationId' => $registrationId,
            'intervieweeId' => $intervieweesId,
            'locations' => $locations,
            'statuss' => $statuss
        ]);
    }
    public function doInterview($eventId, $registrationId, $intervieweeId)
    {

        $registration = Registration::where('id',$registrationId)->first();
        $registration->status = "Sedang di Proses";
        $registration->save();

        $firstDivisionId = Registration::where('id', $registrationId)->first()->first_division_id;
        $secondDivisionId = Registration::where('id', $registrationId)->first()->second_division_id;

        // First division dlu
        $firstDivisionQuestions = Question::where('division_id', $firstDivisionId)->get();

        foreach ($firstDivisionQuestions as $questionForFirstDivision) {
            $interview = new Interview();
            $interview->registration_id = $registrationId;

            $checkInterview = Interview::where('question_id', $questionForFirstDivision->id)->where('registration_id', $registrationId)->first();

            // if($checkInterview!=null){
            //     $idInterview = $checkInterview->id;
            // }

            $interview->question_id = $questionForFirstDivision->id;
            if ($checkInterview == null) {
                $interview->save();
            }
        }

        if ($secondDivisionId != $firstDivisionId) {
            // Second division
            $secondDivisionQuestions = Question::where('division_id', $secondDivisionId)->get();

            foreach ($secondDivisionQuestions as $questionForSecondDivision) {
                $interview = new Interview();
                $interview->registration_id = $registrationId;
                $checkInterview = Interview::where('question_id', $questionForSecondDivision->id)->where('registration_id', $registrationId)->first();

                $interview->question_id = $questionForSecondDivision->id;
                if ($checkInterview == null) {
                    $interview->save();
                }
            }
        }

        $listOfSecondDivisionQuestions = [];

        $listOfFirstDivisionQuestions = Question::where('division_id', $firstDivisionId)->get();
        if($secondDivisionId != $firstDivisionId){
            $listOfSecondDivisionQuestions = Question::where('division_id', $secondDivisionId)->get();
        }

        return view('interviewer/do_interview', [
            'eventId' => $eventId,
            'registrationId' => $registrationId,
            'intervieweeId' => $intervieweeId,
            'firstDivisionQuestion' => $listOfFirstDivisionQuestions,
            'secondDivisionQuestion' => $listOfSecondDivisionQuestions
        ]);
    }
    public function showAnswer($registrationId){
        $datas = Interview::where('registration_id',$registrationId)->get();
        
        $questions = [];
        $answers = [];

        foreach ($datas as $data) {
            array_push($questions,Question::where('id',$data->question_id)->first()->question_content);
            array_push($answers, $data->answers);
        }

        return view('interviewer/information',[
            'questions' => $questions,
            'answers' => $answers
        ]);
    }
    public function acceptInterview($registrationId){
        $target = Registration::where('id',$registrationId)->first();
        $target->status = 'Diterima';
        $target->save();

        return redirect()->back();
    }
    public function rejectInterview($registrationId){
        $target = Registration::where('id',$registrationId)->first();
        $target->status = 'Ditolak';
        $target->save();

        return redirect()->back();
    }
    public function storeAnswer(Request $request)
    {

        if (!$request->question_id) {
            return response()->json([
                'success' => false,
                'message' => 'Gak ketemu Question ID',
            ]);
        }
        if (!$request->registration_id) {
            return response()->json([
                'success' => false,
                'message' => 'Gak ketemu Registration ID',
            ]);
        }
        if (!$request->answer) {
            return response()->json([
                'success' => false,
                'message' => 'Gak ketemu Answer',
            ]);
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'registration_id' => 'required|exists:registrations,id',
            'answer' => 'required|string',
        ]);

        $answer = Interview::where('question_id', $validated['question_id'])
            ->where('registration_id', $validated['registration_id'])
            ->first();

        $answer->answers = $validated['answer'];
        $answer->save();

        if (!$answer) {
            return response()->json([
                'success' => false,
                'message' => 'Answer record not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Answer saved successfully!',
            'data' => $validated['answer'],
        ]);
    }
}
