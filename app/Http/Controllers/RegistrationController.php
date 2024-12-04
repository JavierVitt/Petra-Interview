<?php

namespace App\Http\Controllers;

use App\Models\AvailableInterviewSchedule;
use App\Models\User;
use App\Models\Division;
use App\Models\Interviewer;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    //
    public function store(Request $request){
        
    }
    public function uploadRegistration(Request $request){
        $eventId = $request->eventId;
        $userEmail = Session::get('email');
        $userId = User::where('email',$userEmail)->first()->id;

        $validatedData = $request->validate([
            'nama' => 'required',
            'divisi1' => 'required',
            'jadwalInterview' => 'required',
            'khs' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'nrp' => 'required',
            'divisi2' => 'required',
            'waktu' => 'required',
            'skkk' => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ],[
            'nama.required' => 'Harap Mengisi Nama Lengkap',
            'divisi1.required' => 'Harap Mengisi Divisi Pilihan 1',
            'jadwalInterview.required' => 'Harap Mengisi Tanggal Interview',
            'khs.required' => 'Mohon Untuk Upload Transkrip KHS',
            'khs.mimes' => 'Format Transkrip KHS Adalah JPG, JPEG, PNG',
            'khs.max' => 'File Maximal 2 MB',
            'nrp.required' => 'Harap Mengisi NRP',
            'divisi2.required' => 'Harap Mengisi Divisi Pilihan 2',
            'waktu.required' => 'Harap Mengisi Waktu Interview',
            'skkk.required' => 'Mohon Untuk Upload Transkrip SKKK',
            'skkk.mimes' => 'Format Transkrip SKKK Adalah JPG, JPEG, PNG',
            'skkk.max' => 'File Maximal 2 MB'
        ]);

        $checkUser = Registration::where('user_id',$userId)->first();
        $division = Division::where('id', $validatedData['divisi1'])->first();
        $checkEvent = $division ? $division->event_id : null;

        // echo $checkUser;
        // echo "<br>";
        // echo $checkEvent;
        // echo "<br>";
        // echo $eventId;
        // echo "<br>";
        // die;

        if($checkEvent==$eventId && isset($checkUser)){
            return redirect()->route('register_to_event')->withErrors(['Data Registrasi Anda Telah Terdaftar']);
        }
        

        if ($request->hasFile('khs')) {

            $khsExtension = $request->file('khs')->getClientOriginalExtension();
            $khsNewName = Str::random(20) . '.' . $khsExtension;

            $request->file('khs')->move(public_path('khss'), $khsNewName);

            $validatedData['khs'] = $khsNewName;
        }
        if ($request->hasFile('skkk')) {

            $skkkExtension = $request->file('skkk')->getClientOriginalExtension();
            $skkkNewName = Str::random(20) . '.' . $skkkExtension;

            $request->file('skkk')->move(public_path('skkks'), $skkkNewName);

            $validatedData['skkk'] = $skkkNewName;
        }

        $interviewerId = Interviewer::where('event_id',$eventId)->where('division_id',$validatedData['divisi1'])->first()->id;

        $availableScheduleId = AvailableInterviewSchedule::where('interview_date',$validatedData['jadwalInterview'])->where('interview_time',$validatedData['waktu'])->first()->id;



        $registration = new Registration();

        $registration->interviewer_id = $interviewerId;
        $registration->first_division_id = $validatedData['divisi1'];
        $registration->second_division_id = $validatedData['divisi2'];
        $registration->user_id = $userId;
        $registration->khs = $validatedData['khs'];
        $registration->skkk = $validatedData['skkk'];
        $registration->available_interview_id = $availableScheduleId;

        $registration->save();

        return redirect()->route('register_to_event')->with('success', 'Registrasi Berhasil !!');
    }
}
