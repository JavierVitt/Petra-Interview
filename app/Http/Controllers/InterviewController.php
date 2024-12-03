<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use App\Models\Event;
use App\Models\Interviewer;
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
        Session::put('eventId',$eventId);
        return view('interviewer/manage_interview_details',['eventId'=>$eventId]);
    }
}
