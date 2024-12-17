@extends('templates.base_interviewer')

@section('title', 'Information')

@section('content')

    <!-- Page Title -->
    <div class="mx-4 sm:mx-14 mt-10 mb-6">
        <div class="text-center mb-6">
            <p class="font-bold text-2xl sm:text-4xl text-orange-500">View Answers</p>
        </div>

        <!-- Questions and Answers Container -->
        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg shadow-md">
            <div class="space-y-6">
                @foreach ($questions as $index => $question)
                    <!-- Individual Question and Answer -->
                    <div class="bg-white rounded-lg p-4 sm:p-6 shadow hover:shadow-lg transition">
                        <!-- Question Title -->
                        <h2 class="font-bold text-gray-800 text-lg sm:text-xl mb-2">
                            Question {{ $index + 1 }}:
                        </h2>

                        <!-- Question Content -->
                        <p class="text-gray-700 mb-4 break-words">
                            {{ $question }}
                        </p>

                        <!-- Answer Title -->
                        <h3 class="font-semibold text-green-600 text-md sm:text-lg mb-2">
                            Answer:
                        </h3>

                        <!-- Answer Content -->
                        <p class="text-gray-600 break-words">
                            {{ $answers[$index] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Back Button -->
        <div class="py-6 text-center sm:text-right">
            <button onclick="window.history.back()"
                class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Back
            </button>
        </div>
    </div>

@endsection
