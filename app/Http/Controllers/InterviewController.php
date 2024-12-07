<?php

namespace App\Http\Controllers;

use App\Models\AvailableInterviewSchedule;
use App\Models\Division;
use App\Models\User;
use App\Models\Event;
use App\Models\Interviewer;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InterviewController extends Controller
{
    //
    public function show()
    {
        $userEmail = Session::get('email');

        $userId = User::where('email', $userEmail)->first()->id;

        $divisions = Interviewer::where('user_id', $userId)->get();

        $list = [];

        foreach ($divisions as $division) {
            $event = Division::where('id', $division->id)->get();
            array_push($list, $event[0]['event_id']);
        }

        $events = Event::whereIn('id',$list)->distinct()->orderBy('recruitment_end_date')->get();

        return view('interviewer/manage_interview',['events'=>$events]);
    }
    public function showDetails(Event $eventId){
        $eventId = $eventId->id;
        $userEmail = Session::get('email');

        $interviewerId = User::where('email',$userEmail)->first()->id;

        // Foto, Interviewee, Jadwal(Tanggal dan Jam), Lokasi, KHS, SKKK

        $registrations = Registration::where('interviewer_id',$interviewerId)->get();

        $registrationId = [];
        $fotos = [];
        $interviewees = [];
        $intervieweesId = [];
        $jadwals = [];
        $khss = [];
        $skkks = [];

        foreach ($registrations as $registration) {

            $dataUser = User::where('id',$registration->user_id)->first();
            $dataInterviewee = User::where('id',$registration->user_id)->first();
            $jadwalInterview = AvailableInterviewSchedule::where('id',$registration->available_interview_id)->first();
            $jadwalText = $jadwalInterview->interview_date.", ".$jadwalInterview->interview_time;
            $khs = $registration->khs;
            $skkk = $registration->skkk;

            array_push($registrationId, $registration->id);
            array_push($fotos,$dataUser->profile_picture);
            array_push($intervieweesId, $dataInterviewee->id);
            array_push($interviewees,$dataUser->name);
            array_push($jadwals,$jadwalText);
            array_push($khss,$khs);
            array_push($skkks,$skkk);
        }

        return view('interviewer/manage_interview_details',[
            'eventId' => $eventId,
            'fotos' => $fotos,
            'interviewees' => $interviewees,
            'jadwals' => $jadwals,
            'khss' => $khss,
            'skkks' => $skkks,
            'registrationId' => $registrationId,
            'intervieweeId' => $intervieweesId
        ]);
    }
    public function doInterview($eventId, $registrationId, $intervieweeId){

        

        return view('interviewer/do_interview');
    }
}
