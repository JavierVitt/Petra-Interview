<div
    class="grid grid-cols-1 sm:grid-cols-12 gap-4 mx-4 sm:mx-12 lg:mx-20 rounded-xl shadow-lg mb-5 px-4 py-4 sm:px-6 sm:py-6 bg-peinter-purple">
    <div class="sm:col-span-3 flex justify-center items-center">
        <div class="grid grid-cols-3 gap-2 sm:gap-3 text-center w-full">
            <div class="flex flex-col justify-center text-white">
                <h1 class="font-extrabold text-xs sm:text-lg">{{ date('F', strtotime($recruitment_start_date)) }}</h1>
                <h2 class="font-black text-3xl sm:text-5xl lg:text-6xl">
                    {{ date('j', strtotime($recruitment_start_date)) }}</h2>
                <h3 class="font-semibold text-xs sm:text-lg">{{ date('Y', strtotime($recruitment_start_date)) }}</h3>
            </div>
            <div class="flex items-center justify-center">
                <h1 class="font-bold text-white text-lg sm:text-2xl">to</h1>
            </div>
            <div class="flex flex-col justify-center text-white">
                <h1 class="font-extrabold text-xs sm:text-lg">{{ date('F', strtotime($recruitment_end_date)) }}</h1>
                <h2 class="font-black text-3xl sm:text-5xl lg:text-6xl">
                    {{ date('j', strtotime($recruitment_end_date)) }}</h2>
                <h3 class="font-semibold text-xs sm:text-lg">{{ date('Y', strtotime($recruitment_end_date)) }}</h3>
            </div>
        </div>
    </div>
    <div class="sm:col-span-6 flex items-center justify-center sm:justify-start">
        <h1 class="font-extrabold text-sm sm:text-2xl lg:text-3xl text-white text-center sm:text-left">
            {{ $event_name }}
        </h1>
    </div>
    <div class="sm:col-span-3 flex justify-center sm:justify-end items-center">
        <button
            class="w-full sm:w-auto px-4 py-2 sm:py-3 lg:px-6 lg:py-4 text-sm sm:text-xl lg:text-2xl font-bold rounded-lg shadow-md bg-peinter-yellow text-gray-800 hover:shadow-lg transition duration-300"
            onclick="window.location.href='{{ $button_route }}/{{ $id }}'">
            {{ $button_label }}
        </button>
    </div>
</div>
