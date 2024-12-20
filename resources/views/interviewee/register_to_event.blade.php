@extends('templates.base_interviewee')

@section('title', 'User | Manage Page')

@section('content')

    <p class="mx-4 mt-10 mb-5 font-bold text-4xl text-orange-500 text-center sm:text-left">Register to Event</p>

    <!-- Event List -->
        @foreach ($events as $event)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                @include('partials.event_banner', [
                    'event_name' => $event['event_name'],
                    'recruitment_start_date' => $event['recruitment_start_date'],
                    'recruitment_end_date' => $event['recruitment_end_date'],
                    'button_label' => 'Daftar',
                    'id' => $event['id'],
                    'button_route' => 'registration_form',
                ])
            </div>
        @endforeach
@endsection
