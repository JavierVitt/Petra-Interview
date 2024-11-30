@extends('templates.base_interviewee')

@section('title', 'User | Manage Page')
@section('content')
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Register to Event</p>
    @foreach ($events as $event)
        @include('partials.event_banner', [
            'event_name' => $event['event_name'],
            'recruitment_start_date' => $event['recruitment_start_date'],
            'recruitment_end_date' => $event['recruitment_end_date'],
            'button_label' => "Daftar",
            'button_route' => route('registration_form', $event['id'])
        ])
    @endforeach

@endsection
