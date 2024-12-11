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
    @foreach ($firstDivisionQuestion as $index => $question)
        <div class="question">
            <p class="text-left pl-16 text-4xl mt-12 montserratBold">
                Question {{ $index + 1 }} : {{ $question->question_content }}
            </p>
            <div class="text-center">
                <textarea class="answer-textarea mt-8 bg-gray-300 mx-8 w-11/12 h-24 p-3 rounded-lg overflow-auto"
                    data-question-id="{{ $question->id }}" placeholder="Masukan Jawaban Anda Disini">
        </textarea>
                <input type="hidden" class="registration-id" value="{{ $registrationId }}">
            </div>
        </div>
    @endforeach

    @foreach ($secondDivisionQuestion as $index => $question)
        <p class="text-left pl-16 text-4xl mt-12 montserratBold">Question {{ $index + 1 }} :
            {{ $question->question_content }}
        </p>
        <div class="text-center">
            <textarea class="mt-8 bg-gray-300 mx-8 w-11/12 h-24 p-3 rounded-lg overflow-auto"
                placeholder="Masukan Jawaban Anda Disini"></textarea>
        </div>
    @endforeach

    <div class="flex my-8 justify-center items-center">
        <button class="bg-green-400 py-3 px-8 rounded-lg text-white text-lg border-black border-1 hover:shadow-xl"
            onclick="window.location.href = '{{ route('manage_interview_details', ['event_id' => $eventId]) }}'">
            Finish
        </button>
    </div>

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
                        console.error('Error saving answer:', xhr.responseJSON
                            .message);
                    },
                    complete: function() {
                        textarea.prop('disabled', false);
                    }
                });
            });
        });
    </script>

@endsection
