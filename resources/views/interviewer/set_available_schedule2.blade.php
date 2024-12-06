@extends('templates.base_interviewer')

@section('title', 'Set Available Schedule')

@section('content')

    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="container mx-auto px-4 py-4">
            <!-- Judul Halaman -->
            <h1 class="text-4xl font-bold text-center text-orange-500 mb-4">Set Available Schedule</h1>

            <!-- Kolom untuk Card Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-2">
                <!-- Box Status -->
                <div class="bg-red-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Tidak Bisa</h4>
                </div>
                <div class="bg-yellow-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Interview Online</h4>
                </div>
                <div class="bg-green-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Bisa</h4>
                </div>
                <div class="bg-gray-900 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Sudah Ada Interview</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- ini box jadwal e --}}
    <div class="flex justify-between mx-4">
    @include('partials.available_schedule_box')
    </div>

@endsection
