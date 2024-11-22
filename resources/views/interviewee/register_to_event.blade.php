@extends('templates.base_interviewee')

@section('title', 'User | Manage Page')

@section('content')
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Register to Event</p>
    
    @include('partials.event_banner', [
        'event_name' => "Welcome Grateful Generation Prodi Informatika 2024",
        'interview_date' => "05/10/2024 - 15/10/2024",
        'button_label' => "Daftar",
        'button_route' => "registration_form"
    ])

    @include('partials.event_banner', [
        'event_name' => "Dynamic Career Changes in the Age of Digital Reformation",
        'interview_date' => "05/10/2024 - 15/10/2024",
        'button_label' => "Daftar",
        'button_route' => "registration_form"
    ])
    
@endsection
