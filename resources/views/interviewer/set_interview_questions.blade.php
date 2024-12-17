@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')

    @if ($errors->any())
        <script>
            let errorMessages = @json($errors->all());
            errorMessages.forEach(message => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                    confirmButtonText: "Okay"
                });
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @php $count = 1; @endphp

    <div class="mx-4 sm:mx-14 mt-8 mb-6 flex flex-col sm:flex-row justify-between items-center">
        <p class="font-bold text-2xl sm:text-4xl text-orange-500 mb-4 sm:mb-0">Manage Interview</p>
        @include('partials.manage_interview_buttons', ['eventId' => $eventId])
    </div>

    <!-- Add Question Form -->
    <div class="bg-gray-50 border border-gray-300 rounded-lg shadow-md mx-4 sm:mx-12 p-4 mb-6">
        <form action="{{ route('add_question', $eventId) }}" method="post"
            class="flex flex-col sm:flex-row items-center sm:items-stretch gap-4">
            @csrf
            <!-- Label -->
            <label for="question"
                class="font-semibold text-lg text-gray-700 w-full sm:w-auto text-center sm:text-left whitespace-nowrap">
                Pertanyaan
            </label>
            <!-- Input Field -->
            <div class="w-full flex-grow">
                <input id="question" type="text" name="question" placeholder="Enter your question here"
                    class="w-full bg-gray-200 py-2 px-4 rounded-lg border border-gray-300 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 transition duration-300">
            </div>
            <!-- Submit Button -->
            <button type="submit"
                class="bg-green-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300 shadow-md">
                Add
            </button>
        </form>
    </div>

    <!-- Questions Table -->
    <div class="mx-4 sm:mx-12 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-gray-700 text-center text-sm sm:text-base">No</th>
                    <th class="py-3 px-4 text-gray-700 text-left text-sm sm:text-base">Pertanyaan</th>
                    <th class="py-3 px-4 text-gray-700 text-center text-sm sm:text-base">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    @include('partials.show_question', [
                        'count' => $count,
                        'question' => $question['question_content'],
                        'questionId' => $question['id'],
                        'eventId' => $eventId,
                    ])
                    @php $count++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
