@extends('templates.base')

@section('title', 'User | Landing Page')

@section('content')
    @include('navbar.navbar')
    <div class="grid grid-cols-2 mx-14 mt-10 mb-5">
        <p class="font-bold text-orange-500 text-4xl">Add Event</p>
        <div>Add Event</div>
    </div>
    <div class="mx-14 bg-gray-200 rounded-xl">
        <p class="ml-8 pt-4 font-bold text-4xl">Event</p>
        <div class="grid grid-cols-3 ml-8 mt-4">
            <div>
                <p class="text-xl font-bold">Nama Acara</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Nama Acara Disini">
            </div>
            <div>
                <p class="text-xl font-bold">Tanggal Open Recruitment</p>
                <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2">
            </div>
            <div>
                <p class="text-xl font-bold">Tanggal Close Recruitment</p>
                <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2">
            </div>
        </div>
        <div class="grid grid-cols-3 ml-8 mt-4 pb-7">
            <div class="col-span-2">
                <p class="text-xl font-bold">Deskripsi Acara</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-32 mt-2 px-2" placeholder="Input Deskripsi Acara Disini">
            </div>
            <div class="col-span-1">
                <p class="text-xl font-bold">Tanggal Acara</p>
                <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Tanggal Acara Disini">
                <p class="text-xl font-bold mt-3">Lingkup Acara</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2  px-2" placeholder="Input Lingkup Acara Disini">
            </div>
        </div>
        <div class="grid grid-cols-3 ml-8 pb-7">
            <div>
                <p class="text-xl font-bold">Lokasi Acara</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Lokasi Acara Disini">
            </div>
            <div>
                <p class="text-xl font-bold">Proposal Acara</p>
                <input type="file" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 pt-1 pl-1 px-2">
            </div>
            <div>
                <p class="text-xl font-bold">RA/RMA Acara</p>
                <input type="file" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 pt-1 pl-1">
            </div>
        </div>
    </div>
    <div class="mx-14 bg-gray-200 rounded-xl mt-8 mb-4 pb-7">
        <div class="grid grid-cols-7">
            <p class="ml-8 py-4 font-bold text-4xl col-span-6">Divisions</p>
            <button id="addButton" class="col-span-1 bg-black text-white m-2 mr-3 rounded-xl hover:shadow-lg">+ Add Division</button>
        </div>
        <div id="container">
            <div class="grid grid-cols-3 ml-8 mt-4">
                <div>
                    <p class="text-xl font-bold">Nama Divisi</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Nama Acara Disini">
                </div>
                <div>
                    <p class="text-xl font-bold">Interviewer 1</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id">
                </div>
                <div>
                    <p class="text-xl font-bold">Interviewer 2</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id">
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-11 text-center mb-8 mt-4">
        <div class="col-span-3"></div>
        <div class="col-span-2">
            <button class=" bg-red-600 h-10 w-40 text-white rounded-md hover:shadow-xl">Cancel</button>
        </div>
        <div class="col-span-1"></div>
        <div class="col-span-2">
            <button class=" bg-green-500 h-10 w-40 text-white rounded-md hover:shadow-xl">Submit</button>
        </div>
        <div class="col-span-3"></div>
    </div>
    
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
          const newContent = `
          <div class="grid grid-cols-3 ml-8 mt-4">
            <div>
                <p class="text-xl font-bold">Nama Divisi</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Nama Acara Disini">
            </div>
            <div>
                <p class="text-xl font-bold">Interviewer 1</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id">
            </div>
            <div>
                <p class="text-xl font-bold">Interviewer 2</p>
                <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id">
            </div>
        </div>
          `;
    
          document.getElementById('container').insertAdjacentHTML('beforeend', newContent);
        });
      </script>
@endsection
