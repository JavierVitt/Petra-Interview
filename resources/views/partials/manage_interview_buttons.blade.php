<div class="flex justify-center space-x-4">
    {{-- Button 'See All Interviewee' --}}
    @if(Route::currentRouteName() !== 'manage_interview_details')
        <button class="bg-orange-500 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
            onclick="window.location.href='{{ route('manage_interview_details', ['event_id' => $eventId]) }}'">
            See All Interviewee
        </button>
    @endif

    {{-- Button 'Set Interview Questions' --}}
    @if(Route::currentRouteName() !== 'show_question_page')
        <button class="bg-orange-500 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
            onclick="window.location.href='{{ route('show_question_page', ['eventId' => $eventId]) }}'">
            Set Interview Questions
        </button>
    @endif

    {{-- Button 'Set Available Schedule' --}}
    @if(Route::currentRouteName() !== 'set_available_schedule')
        <button class="bg-purple-600 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
            onclick="window.location.href='{{ route('set_available_schedule', ['eventId' => $eventId]) }}'">
            Set Available Schedule
        </button>
    @endif
</div>
