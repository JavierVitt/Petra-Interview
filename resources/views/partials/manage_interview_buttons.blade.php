<div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-4 sm:space-y-0 mt-4">
    @if (Route::currentRouteName() !== 'manage_interview_details')
        <button
            class="bg-orange-500 py-2 px-4 w-full sm:w-auto text-center rounded-lg border border-black text-white text-sm sm:text-lg hover:shadow-lg whitespace-nowrap transition-transform transform hover:scale-105"
            onclick="window.location.href='{{ route('manage_interview_details', ['event_id' => $eventId]) }}'">
            See All Interviewee
        </button>
    @endif

    @if (Route::currentRouteName() !== 'show_question_page')
        <button
            class="bg-orange-500 py-2 px-4 w-full sm:w-auto text-center rounded-lg border border-black text-white text-sm sm:text-lg hover:shadow-lg whitespace-nowrap transition-transform transform hover:scale-105"
            onclick="window.location.href='{{ route('show_question_page', ['eventId' => $eventId]) }}'">
            Set Interview Questions
        </button>
    @endif

    @if (Route::currentRouteName() !== 'set_available_schedule')
        <button
            class="bg-purple-600 py-2 px-4 w-full sm:w-auto text-center rounded-lg border border-black text-white text-sm sm:text-lg hover:shadow-lg whitespace-nowrap transition-transform transform hover:scale-105"
            onclick="window.location.href='{{ route('set_available_schedule', ['eventId' => $eventId]) }}'">
            Set Available Schedule
        </button>
    @endif
</div>
