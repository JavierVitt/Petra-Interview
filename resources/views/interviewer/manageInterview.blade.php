@extends('templates.base')

@section('title', 'User | Manage Page')

@section('content')
    @include('navbar.navbar')
    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        <div class=" col-span-1">
            <button class=" bg-orange-500 py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg" style="background-color: rgb(256,116,20)">Set Interview Question</button>
        </div>
        <div class=" col-span-1">
            <button class=" py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg" style="background-color: rgb(8,140,36)">Edit Available Schedule</button>
        </div>
        <div class=" col-span-1">
            <button class=" py-2 rounded-xl border border-black px-8 text-white text-lg hover:shadow-lg" style="background-color: rgb(56,4,140)">Set Available Schedule</button>
        </div>
    </div>
    <div class="grid grid-cols-7 text-center mx-12 border-b-2 border-black text-lg">
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Foto</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Interviewee</div>
        <div class="col-span-2 bg-gray-200 mx-3 mb-2">Jadwal</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Lokasi</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Acara</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Action</div>
    </div>
    <div class="mt-3 grid grid-cols-7 text-center mx-12 border-b-2 border-gray-100 text-lg">
        <div class="col-span-1 mx-3 mb-2"><img src="" alt="Null"></div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">Javier Vittorio</div>
        <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">Rabu, 6 November 2024, 13.30 - 14.30</div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">Selasar P2</div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">WGGP 2024</div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">Action</div>
    </div>
@endsection
