@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')

@php
    $count = 1;
@endphp
    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        @include('partials.manage_interview_buttons',['eventId'=>Session::get('eventId')])
    </div>
    <div class="mb-5">
        {{-- Form e tlg diapikno rek --}}
        <form action="{{ route('add_question', $eventId) }}" method="post">
            @csrf
            <p>Pertanyaan</p>
            <input class="bg-gray-200" type="text" name="question">
            <button class="bg-red-500 text-white" type="submit">Add</button>
        </form>
    </div>
    <div class="grid grid-cols-6 text-center mx-12 border-b-2 border-black text-lg">
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">No</div>
        <div class="col-span-4 bg-gray-200 mx-3 mb-2">Pertanyaan</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Action</div>
    </div>
        @foreach ($questions as $question)
            @include('partials.show_question',[
                'count' => $count,
                'question' => $question['question_content']
            ])
            @php
                $count ++;
            @endphp
        @endforeach

@endsection
