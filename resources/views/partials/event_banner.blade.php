<div class="grid grid-cols-12 gap-4 mx-12 rounded-xl shadow-lg mb-3 px-7 py-5 bg-peinter-purple">
    <div class="col-span-3 flex justify-start items-center">
        <div class="grid grid-cols-10">
            <div class="flex flex-col justify-center col-span-4 text-white text-center space-y-0">
                <h1 class="font-extrabold text-lg">{{ date('F', strtotime($recruitment_start_date)) }}</h1>
                <h2 class="font-black text-6xl">{{ date('j', strtotime($recruitment_start_date)) }}</h2>
                <h3 class="font-semibold text-xl">{{ date('Y', strtotime($recruitment_start_date)) }}</h3>
            </div>
            <div class="flex items-center mx-7 col-span-2">
                <h1 class="font-bold text-white text-2xl">to</h1>
            </div>
            
            <div class="flex flex-col justify-center col-span-4 text-white text-center space-y-0">
                <h1 class="font-extrabold text-lg">{{ date('F', strtotime($recruitment_end_date)) }}</h1>
                <h2 class="font-black text-6xl">{{ date('j', strtotime($recruitment_end_date)) }}</h2>
                <h3 class="font-semibold text-xl">{{ date('Y', strtotime($recruitment_end_date)) }}</h3>
            </div>
        </div>
    </div>
    
    <div class="col-span-6 mx-12 text-left font-extrabold text-white text-2xl flex items-center">
        <h1>{{ $event_name }}</h1>
    </div>
    
    <div class="col-span-3 flex justify-end items-center">
        <button class="w-full py-4 font-bold flex justify-center items-center rounded-xl shadow-lg text-4xl bg-peinter-yellow text-gray-100" onclick="window.location.href='{{ $button_route }}'">{{ $button_label }}</button>
    </div>
</div>