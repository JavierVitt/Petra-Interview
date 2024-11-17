@extends('templates.base')

@section('title', 'User | Manage Page')

@section('content')
    @include('navbar.navbar')
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Manage Interview</p>
    <div class="grid grid-cols-8 mx-12 rounded-xl shadow-lg mb-3" style="background-color:rgb(56,4,140)">
        <div class="col-span-4 text-left py-6 pl-4 font-bold text-white text-2xl">
            <p>Welcome Grateful Generation Prodi Informatika 2024</p>
        </div>
        <div class="col-span-2 text-center py-3 text-white font-bold text-lg">
            <p>Interview Date</p>
            <p>05/10/2024 - 15/10/2024</p>
        </div>
        <div class="col-span-2 flex justify-end items-center">
            <button class="text-black font-bold py-5 px-16 rounded-xl shadow-lg text-4xl" style="background-color:rgb(248,148,44)">Manage</button>
        </div>
    </div>
    <div class="grid grid-cols-8 mx-12 rounded-xl shadow-lg mb-3" style="background-color:rgb(56,4,140)">
        <div class="col-span-4 text-left py-6 pl-4 font-bold text-white text-2xl">
            <p>Dynamic Career Changes in the Age of Digital Reformation</p>
        </div>
        <div class="col-span-2 text-center py-3 text-white font-bold text-lg">
            <p>Interview Date</p>
            <p>05/10/2024 - 15/10/2024</p>
        </div>
        <div class="col-span-2 flex justify-end items-center">
            <button class="text-black font-bold py-5 px-16 rounded-xl shadow-lg text-4xl" style="background-color:rgb(248,148,44)">Manage</button>
        </div>
    </div>
@endsection
