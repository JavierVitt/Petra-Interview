@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Manage Interview</p>

    @foreach ($events as $event)
        @include('partials.event_banner', [
            'event_name' => $event['event_name'],
            'interview_date' => $event['recruitment_end_date'] . "-" . $event['recruitment_end_date'],
            'button_label' => "Manage",
            'button_route' => "manage_interview_details",
            'recruitment_start_date' => $event['recruitment_start_date'],
            'recruitment_end_date' => $event['recruitment_end_date']
        ])
    @endforeach


@endsection
