<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Event;
use App\Models\Division;
use App\Models\Interviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\AvailableInterviewSchedule;
use App\Models\Interview;
use App\Models\Registration;

class ScheduleController extends Controller
{
    //
    public function addSchedule(Request $request, $eventId)
    {
        $userEmail = Session::get('email');

        $event = Event::where('id', $eventId)->first();
        $eventOprec = $event->recruitment_start_date;
        $eventCloserec = $event->recruitment_end_date;

        $validation = $request->validate([
            'date' => 'required|after_or_equal:' . $eventOprec . '|before_or_equal:' . $eventCloserec . '|after:now',
            'time' => 'required',
            'location' => 'required'
        ], [
            'date.required' => 'Harap Mengisi Tanggal Interview',
            'date.after' => 'Tanggal Interview Wajib Lebih dari Hari Ini',
            'date.after_or_equal' => 'Tanggal Open Recruitment Dimulai Pada : ' . $eventOprec,
            'date.before_or_equal' => 'Tanggal Close Recruitment Berakhir Pada : ' . $eventCloserec,
            'time.required' => 'Harap Mengisi Waktu Interview',
            'location.required' => 'Harap mengisi lokasi interview'
        ]);

        $userId = User::where('email', $userEmail)->first()->id;

        $interviewerId = Interviewer::where('user_id', $userId)->where('event_id', $eventId)->first()->id;

        $checkSchedule = AvailableInterviewSchedule::where('interviewer_id', $interviewerId)
            ->where('interview_date', $validation['date'])->where('interview_time', $validation['time'])
            ->where('event_id', $eventId)->first();

        if ($checkSchedule != null) {
            return redirect()->route('set_available_schedule', ['eventId' => $eventId])->withErrors(['errors' => 'Jadwal Sudah Ada']);
        }


        $schedule = new AvailableInterviewSchedule();

        $schedule->interview_date = $validation['date'];
        $schedule->interview_time = $validation['time'];
        $schedule->interview_location = $validation['location'];
        $schedule->interviewer_id = $interviewerId;
        $schedule->event_id = $eventId;

        $schedule->save();

        $allSchedule = AvailableInterviewSchedule::getScheduleById($eventId, $interviewerId);

        return redirect('/set_available_schedule/' . $eventId)->with(['schedules'=> $allSchedule, 'success'=>'Jadwal Berhasil Ditambah !']);
    }
    public function showPage($eventId)
    {
        $userEmail = Session::get('email');

        $event = Event::where('id', $eventId)->first();

        $userId = User::where('email', $userEmail)->first()->id;

        $interviewerId = Interviewer::where('user_id', $userId)->where('event_id', $eventId)->first()->id;

        $schedule = new AvailableInterviewSchedule();

        $allSchedule = AvailableInterviewSchedule::getScheduleById($eventId, $interviewerId);

        $checkId = [];

        foreach ($allSchedule as $schedule) {
            $scheduleId = $schedule->id;

            $check = Registration::where('available_interview_id', $scheduleId)->first();

            if ($check != null) {
                array_push($checkId, 1);
            } else {
                array_push($checkId, 0);
            }
        }


        return view('interviewer.set_available_schedule', [
            'schedules' => $allSchedule,
            'checkSchedules' => $checkId,
            'eventId' => $eventId,
        ]);
    }
    public function fetchItems(Request $request)
    {

        // Get the email from the request
        $email = $request->input('email');


        // Get the event data (assuming it's an array or object)
        $event = $request->input('event');

        try {
            // Get the email and event
            $email = $request->input('email');
            $eventId = $request->input('event');
            $division = $request->input('division');

            // Check if the event ID exists in the database
            $event = Event::find($eventId);
            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }

            // Fetch user and interviewer data
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $interviewer = Interviewer::where('division_id', $division)->where('event_id', $eventId)->first();
            if (!$interviewer) {
                return response()->json(['error' => 'Interviewer not found'], 404);
            }

            // $divisionId = Division::where('division', $division)->first();

            $listInterviewer = [];

            $interviewerWithDivisionId = Interviewer::where('division_id', $division)->where('event_id', $eventId)->get();

            foreach($interviewerWithDivisionId as $interviewer){
                array_push($listInterviewer, $interviewer->id);
            }

            // $interviewer = Interviewer::where('division_id',$division);


            // Fetch available interview schedules
            $schedules = AvailableInterviewSchedule::select('interview_date')
                ->distinct()
                ->whereIn('interviewer_id', $listInterviewer)
                ->where('event_id', $eventId)
                ->where('interview_date', '>', now())
                ->get();

            // Return the schedules as JSON
            return response()->json($schedules);
        } catch (Exception $e) {
            // Log the error message for debugging
            Log::error('Error fetching items: ' . $e->getMessage());

            // Return a generic error message
            return response()->json(['error' => 'An error occurred while fetching items'], 500);
        }
    }
    public function updateTime(Request $request)
    {
        $email = $request->input('email');
        $eventId = $request->input('event');
        $tanggal = $request->input('tanggal');
        $division = $request->input('division');

        $event = Event::find($eventId);
        $user = User::where('email', $email)->first();
        $interviewer = Interviewer::where('division_id', $division)->where('event_id', $eventId)->first()->id;

        $availableInterviews = Registration::all();

        $listOfSchedulesTaken = [];

        foreach ($availableInterviews as $availableInterview) {
            array_push($listOfSchedulesTaken, $availableInterview->available_interview_id);
        }

        // $times = AvailableInterviewSchedule::where('interviewer_id', $interviewer)->where('event_id', $eventId)->where('interview_date', $tanggal)->get();

        $times = AvailableInterviewSchedule::where('event_id', $eventId)
            ->where('interview_date', $tanggal)
            ->whereNotIn('id', $listOfSchedulesTaken)
            ->get();

        return response()->json($times);
    }
    public function deleteSchedule($eventId, $availableId)
    {
        $deleteTarget = AvailableInterviewSchedule::where('id', $availableId)->first();

        $deleteTarget->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil di hapus');
    }
}
