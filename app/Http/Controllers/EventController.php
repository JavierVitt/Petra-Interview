<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
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
            $validatedData['raRmaAcara'] = $request->file('raRmaAcara')->store('ramas');
        }

        $event = Event::create($validatedData);

        // Redirect or return response
        return redirect()->route('manage_interview');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('interviewee/registration_form', compact('event'));
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
}
