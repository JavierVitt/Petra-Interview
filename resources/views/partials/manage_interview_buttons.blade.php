<div class=" col-span-1">
    <button class=" bg-orange-500 py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg"
        style="background-color: rgb(256,116,20)"
        onclick="window.location.href='{{ route('set_interview_questions') }}'">Set Interview
        Questions</button>
</div>
<div class=" col-span-1">
    <button class=" py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg"
        style="background-color: rgb(8,140,36)"
        onclick="window.location.href='{{ route('edit_available_schedule') }}'">Edit Available Schedule</button>
</div>
<div class=" col-span-1">
    <button class=" py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg"
        style="background-color: rgb(56,4,140)"
        onclick="window.location.href='{{ route('set_available_schedule',['eventId'=> $eventId]) }}'">Set Available
        Schedule</button>

</div>
