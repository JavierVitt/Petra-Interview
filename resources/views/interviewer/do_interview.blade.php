@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')

    <p class="text-center text-4xl mt-12 montserratBold">Question 1: Berikan saya alasan mengapa saya harus merekrut anda!
    </p>
    <div class="text-center">
        <textarea class="mt-8 bg-gray-300 mx-8 w-11/12 h-24 p-3 rounded-lg overflow-auto" placeholder="Masukan Jawaban Anda Disini"
            autofocus></textarea>
    </div>
    <div class="grid grid-cols-5 mt-8">
        <div class="text-right col-span-2">
            <button
                class=" bg-red-600 py-3 px-12 rounded-lg text-white text-lg border-black border-1 hover:shadow-xl">Back</button>
        </div>
        <div class="col-span-1"></div>
        <div class="text-left col-span-2">
            <button
                class=" bg-blue-800 py-3 px-12 rounded-lg text-white text-lg border-black border-1 hover:shadow-xl">Next</button>
        </div>
    </div>
@endsection
