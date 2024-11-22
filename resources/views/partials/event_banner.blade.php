<div class="grid grid-cols-8 mx-12 rounded-xl shadow-lg mb-3 px-7" style="background-color:rgb(56,4,140)">
    <div class="col-span-4 text-left py-6 font-bold text-white text-2xl">
        <p>{{ $event_name }}</p>
    </div>
    <div class="col-span-2 flex justify-center items-center">
        <div class="text-center text-white font-bold text-lg">
            <p>Interview Date</p>
            <p>{{ $interview_date }}</p>
        </div>    
    </div>
    <div class="col-span-2 flex justify-end items-center">
        <button class="w-full py-4 text-black font-bold flex justify-center items-center rounded-xl shadow-lg text-4xl bg-peinter-yellow" onclick="window.location.href='{{ route($button_route) }}'">{{ $button_label }}</button>
    </div>
</div>