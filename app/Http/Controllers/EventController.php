<?php

namespace App\Http\Controllers;

use App\Models\AvailableInterviewSchedule;
use App\Models\User;
use App\Models\Event;
use App\Models\Division;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('recruitment_end_date', '>', now())->orderBy('recruitment_end_date')->get();
        return view('interviewee/register_to_event', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $chairmanId = User::where('email',Session::get('email'))->first()->id;
        // Validate the request
        $validatedData = $request->validate([
            'namaAcara' => 'required|string|max:255',
            'tanggalOprec' => 'required|date',
            'tanggalCloserec' => 'required|date|after_or_equal:tanggalOprec',
            'deskripsiAcara' => 'nullable|string',
            'tanggalAcara' => 'required|date|after_or_equal:tanggalCloserec',
            'lingkupAcara' => 'nullable|string|max:255',
            'lokasiAcara' => 'nullable|string|max:255',
            'proposalAcara' => 'nullable|file|mimes:pdf|max:2048',
            'raRmaAcara' => 'nullable|file|mimes:xlsx,xls|max:2048'
        ], [
            'namaAcara.max' => 'Nama Acara Terlalu Panjang',
            'tanggalCloserec.after_or_equal' => 'Tanggal Close Recruitment Harus Lebih dari Tanggal Open Recruitment',
            'tanggalAcara.after_or_equal' => 'Tanggal Acara Harus Lebih dari Tanggal Close Recruitment',
            'lingkupAcara.max' => 'Lingkup Acara Terlalu Panjang',
            'proposalAcara.mimes' => 'Tipe File Harus Berupa PDF',
            'raRmaAcara.mimes' => 'Tipe File Harus Berupa XLSX atau XLS'
        ]);

        // Handle file
        if ($request->hasFile('proposalAcara')) {

            $proposalExtension = $request->file('proposalAcara')->getClientOriginalExtension();
            $proposalNewName = Str::random(20) . '.' . $proposalExtension;

            // Move the uploaded file to the public/proposals folder
            $request->file('proposalAcara')->move(public_path('proposals'), $proposalNewName);

            // Update the validated data to point to the publicly accessible URL
            $validatedData['proposalAcara'] = $proposalNewName;
        }

        if ($request->hasFile('raRmaAcara')) {
            // $validatedData['raRmaAcara'] = $request->file('raRmaAcara')->store('ramas');

            $raRmaExtension = $request->file('raRmaAcara')->getClientOriginalExtension();
            $raRmaNewName = Str::random(20) . '.' . $raRmaExtension;

            // Move the uploaded file to the public/raRmas folder
            $request->file('raRmaAcara')->move(public_path('raRmas'), $raRmaNewName);

            // Update the validated data to point to the publicly accessible URL
            $validatedData['raRmaAcara'] = $raRmaNewName;
        }

        $event = new Event();

        $event->chairman_id = $chairmanId;
        $event->event_name = $validatedData['namaAcara'];
        $event->event_description = $validatedData['deskripsiAcara'];
        $event->recruitment_start_date = $validatedData['tanggalOprec'];
        $event->recruitment_end_date = $validatedData['tanggalCloserec'];
        $event->event_scope = $validatedData['lingkupAcara'];
        $event->event_date = $validatedData['tanggalAcara'];
        $event->event_location = $validatedData['lokasiAcara'];
        $event->proposal = $validatedData['proposalAcara'];
        $event->raRma = $validatedData['raRmaAcara'];
        $event->status = 'ongoing';
        $event->created_at = now();
        $event->updated_at = now();

        $event->save();

        $eventId = Event::where('proposal', $validatedData['proposalAcara'])->value('id');

        $divisionController = new DivisionController();

        if ($divisionController->store($request, $eventId) == false) {
            return redirect()->route('add_event')->withErrors(['errors' => 'Seluruh Interviewer Wajib Sign Up Terlebih Dahulu di Peinter']);
        }

        // Redirect or return response
        return redirect()->route('manage_interview');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $email = Session::get('email');
        $userData = User::where('email', $email)->first();
        $divisions = Division::where('event_id', $event->id)->get();
        return view('interviewee/registration_form', ['userData' => $userData, 'event' => $event, 'divisions' => $divisions]);
    }

    public function details ($eventId)
    {
        $event = Event::where('id', $eventId)->first();

        $chairmanId = $event->chairman_id;
        $chairman = User::where('id', $chairmanId)->first()->name;

        $divisions = Division::where('event_id', $eventId)->get();
        return view('admin/event_details', ['event' => $event, 'chairman' => $chairman, 'divisions' => $divisions]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showApplications()
    {

        $userEmail = Session::get('email');
        $userId = User::where('email', $userEmail)->first()->id;

        $registrations = Registration::where('user_id', $userId)->get();

        $interviewerNames = [];
        $jadwalInterviews = [];
        $eventNames = [];
        $statuss = [];

        foreach ($registrations as $registration) {
            $interviewerName = User::where('id', $registration->id)->first()->name;
            $jadwal = AvailableInterviewSchedule::where('id',$registration->available_interview_id)->first()->interview_date . ", " . AvailableInterviewSchedule::where('id',$registration->available_interview_id)->first()->interview_time;
            $eventName = Event::where('id',$registration->event_id)->first()->event_name;
            $status = $registration->status;

            array_push($interviewerNames, $interviewerName);
            array_push($jadwalInterviews, $jadwal);
            array_push($eventNames, $eventName);
            array_push($statuss, $status);
        }

        return view('interviewee/manage_applications',[
            'interviewerNames' => $interviewerNames,
            'jadwalInterviews' => $jadwalInterviews,
            'eventNames' => $eventNames,
            'statuss' => $statuss
        ]);
    }
}
