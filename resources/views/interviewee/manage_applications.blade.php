@extends('templates.base_interviewee')

@section('title', 'User | Manage Applications')

@section('content')
    <h1 class="mx-4 mt-10 mb-5 font-bold text-4xl text-orange-500">View Applications</h1>

    <div class="mx-4 mt-5 overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-center text-xs sm:text-base">Nomor</th>
                    <th class="border border-gray-300 px-4 py-2 text-xs sm:text-base">Interviewer</th>
                    <th class="border border-gray-300 px-4 py-2 text-xs sm:text-base">Jadwal</th>
                    <th class="border border-gray-300 px-4 py-2 text-xs sm:text-base">Tempat</th>
                    <th class="border border-gray-300 px-4 py-2 text-xs sm:text-base">Acara</th>
                    <th class="border border-gray-300 px-4 py-2 text-center text-xs sm:text-base">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interviewerNames as $index => $item)
                    @include('partials.event_application', [
                        'count' => $index + 1,
                        'interviewerName' => $item,
                        'jadwalInterview' => $jadwalInterviews[$index],
                        'eventName' => $eventNames[$index],
                        'status' => $statuss[$index],
                    ])
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
