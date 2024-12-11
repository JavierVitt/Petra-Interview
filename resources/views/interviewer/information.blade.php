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
                {{-- DATA DUMMY --}}
                <div class="border-b pb-4">
                    <p class="font-semibold text-xl text-gray-700">Q1: Pertanyaan interview dummy?</p>
                    <p class="text-gray-600 mt-2">A1: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                {{-- DATA DUMMY --}}
                <div class="border-b pb-4">
                    <p class="font-semibold text-xl text-gray-700">Q2: Pertanyaan interview dummy?</p>
                    <p class="text-gray-600 mt-2">A2: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                {{-- DATA DUMMY --}}
                <div class="border-b pb-4">
                    <p class="font-semibold text-xl text-gray-700">Q3: Pertanyaan interview dummy?</p>
                    <p class="text-gray-600 mt-2">A3: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                {{-- DATA DUMMY --}}
                <div class="border-b pb-4">
                    <p class="font-semibold text-xl text-gray-700">Q3: Pertanyaan interview dummy?</p>
                    <p class="text-gray-600 mt-2">A3: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
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
