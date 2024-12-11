<div class="flex justify-center space-x-4">
    <button class="bg-orange-500 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
        onclick="window.location.href='{{ route('manage_interview_details', ['event_id' => $eventId]) }}'">
        See All Interviewee
    </button>
    <button class="bg-orange-500 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
        onclick="window.location.href='{{ route('show_question_page', ['eventId' => $eventId]) }}'">
        Set Interview Questions
    </button>
    <button class="bg-purple-600 py-1 px-4 rounded-lg border border-black text-white text-lg hover:shadow-lg whitespace-nowrap"
        onclick="window.location.href='{{ route('set_available_schedule', ['eventId' => $eventId]) }}'">
        Set Available Schedule
    </button>
</div>
