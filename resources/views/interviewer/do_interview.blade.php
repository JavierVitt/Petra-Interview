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
                timer: 1000
            });
        </script>
    @endif

    <div class="mt-6 mx-4 sm:mx-14">
        @foreach ($firstDivisionQuestion as $index => $question)
            <div class="question mb-8">
                <p class="text-left text-2xl sm:text-3xl montserratBold mb-4">
                    Question {{ $index + 1 }}: {{ $question->question_content }}
                </p>
                <div class="text-center">
                    <textarea class="answer-textarea mt-2 bg-gray-300 w-full h-32 p-3 rounded-lg resize-none"
                        data-question-id="{{ $question->id }}" placeholder="Masukkan Jawaban Anda Disini"></textarea>
                    <input type="hidden" class="registration-id" value="{{ $registrationId }}">
                </div>
            </div>
        @endforeach

        @foreach ($secondDivisionQuestion as $index => $question)
            <div class="mb-8">
                <p class="text-left text-2xl sm:text-3xl montserratBold mb-4">
                    Question {{ $index + 1 }}: {{ $question->question_content }}
                </p>
                <div class="text-center">
                    <textarea class="mt-2 bg-gray-300 w-full h-32 p-3 rounded-lg resize-none" placeholder="Masukkan Jawaban Anda Disini"></textarea>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Finish Button -->
    <div class="flex my-8 justify-center">
        <button class="bg-green-400 py-3 px-8 rounded-lg text-white text-lg hover:shadow-lg transition duration-300"
            onclick="window.location.href = '{{ route('manage_interview_details', ['event_id' => $eventId]) }}'">
            Finish
        </button>
    </div>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function() {
            $('.answer-textarea').on('blur', function() {
                let textarea = $(this);

                let registrationId = textarea.closest('.question').find('.registration-id').val();

                if (!registrationId) {
                    console.error('Registration ID is missing or undefined!');
                    return;
                }

                let questionId = textarea.data('question-id');
                let answer = textarea.val();

                textarea.prop('disabled', true);

                $.ajax({
                    url: "{{ route('save-answer') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        question_id: questionId,
                        answer: answer,
                        registration_id: registrationId
                    },
                    success: function(response) {
                        console.log('Answer saved:', response.data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations!',
                            text: 'Answer Saved',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    },
                    error: function(xhr) {
                        console.error('Error saving answer:', xhr.responseJSON.message);
                    },
                    complete: function() {
                        textarea.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
