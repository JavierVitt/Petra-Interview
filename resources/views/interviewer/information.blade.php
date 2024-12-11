@extends('templates.base_interviewer')

@section('title', 'Information')

@section('content')

    <div class="mx-14 mt-10 mb-1">
        <div class="text-center mb-6">
            <p class="font-bold text-4xl text-orange-500">View Answers</p>
        </div>

        <!-- Rangkuman Pertanyaan dan Jawaban -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <div class="space-y-6">
                @foreach ($questions as $index => $question)
                    @include('partials.result',[
                        'count' => $index+1,
                        'question' => $question,
                        'answer' => $answers[$index]
                    ])
                @endforeach
            </div>
        </div>

        <!-- Back Button -->
        <div class="py-4 text-right">
            <button onclick="window.history.back()"
                class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Back
            </button>
        </div>
    </div>

@endsection
