<div class="grid grid-cols-12 gap-4 mx-12 rounded-xl shadow-lg mb-3 px-7 py-5 bg-peinter-purple">
    <div class="col-span-5 text-left font-extrabold text-white text-2xl flex items-center">
        <h1>{{ $event_name }}</h1>
    </div>
    <div class="col-span-4 flex justify-center items-center">
        {{-- <div class="text-center text-white font-bold text-lg">
        <p>Recruitment Date</p>
            <p>
                {{ date('F j, Y', strtotime($recruitment_start_date)) }} -
                {{ date('F j, Y', strtotime($recruitment_end_date)) }}
            </p>

        </div>     --}}

        <div class="flex justify-between">
            <div class="flex flex-col text-white text-center space-y-0">
                <h1 class="font-bold text-2xl">{{ date('F', strtotime($recruitment_start_date)) }}</h1>
                <h2 class="font-black text-6xl">{{ date('j', strtotime($recruitment_start_date)) }}</h2>
                <h3 class="font-semibold text-xl">{{ date('Y', strtotime($recruitment_start_date)) }}</h3>
            </div>
            <div class="flex items-center mx-7">
                <h1 class="font-bold text-white text-2xl">to</h1>
            </div>
            
            <div class="flex flex-col text-white text-center space-y-0">
                <h1 class="font-bold text-2xl">{{ date('F', strtotime($recruitment_end_date)) }}</h1>
                <h2 class="font-black text-6xl">{{ date('j', strtotime($recruitment_end_date)) }}</h2>
                <h3 class="font-semibold text-xl">{{ date('Y', strtotime($recruitment_end_date)) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-span-3 flex justify-end items-center">
        <button class="w-full py-4 text-black font-bold flex justify-center items-center rounded-xl shadow-lg text-4xl bg-peinter-yellow" onclick="window.location.href='{{ route($button_route) }}'">{{ $button_label }}</button>
    </div>
</div>