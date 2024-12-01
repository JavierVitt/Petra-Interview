@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')
    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        @include('partials.manage_interview_buttons')
    </div>
    <div class="grid grid-cols-6 text-center mx-12 border-b-2 border-black text-lg">
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">No</div>
        <div class="col-span-4 bg-gray-200 mx-3 mb-2">Pertanyaan</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Action</div>
    </div>
        <div class="grid grid-cols-6 text-center mx-12 border-b-2 mt-4 border-gray-100 text-lg">
            <div class="col-span-1 font-bold text-3xl mx-3 mb-2">1.</div>{{-- Nnti iki pake foreach e php ae --}}
            <div class="col-span-4 bg-gray-300 mx-3 mb-2 pt-2">Apa itu WGG</div>
            <div class="col-span-1 mx-3 mb-2"><button
                    class=" bg-red-600 px-14 py-2 rounded-xl text-white border border-black hover:text-gray-200">Delete</button>
            </div>
        </div>
        <div class="grid grid-cols-6 text-center mx-12 border-b-2 mt-4 border-gray-100 text-lg">
            <div class="col-span-1 font-bold text-3xl mx-3 mb-2">1.</div>{{-- Nnti iki pake foreach e php ae --}}
            <div class="col-span-4 bg-gray-300 mx-3 mb-2 pt-2">Apa itu WGG</div>
            <div class="col-span-1 mx-3 mb-2"><button
                    class=" bg-red-600 px-14 py-2 rounded-xl text-white border border-black hover:text-gray-200">Delete</button>
            </div>
        </div>

@endsection
