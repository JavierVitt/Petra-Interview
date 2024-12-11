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

    @php
        $count = 1;
    @endphp
    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        <div class="col-span-3 flex items-center justify-center">
            @include('partials.manage_interview_buttons', ['eventId' => $eventId])
        </div>
    </div>
    <div class="mb-5">
        {{-- Form e tlg diapikno rek --}}
        <form action="{{ route('add_question', $eventId) }}" method="post">
            @csrf
            <p>Pertanyaan</p>
            <input class="bg-gray-200" type="text" name="question" autocomplete="off">
            <button class="bg-red-500 text-white" type="submit">Add</button>
        </form>
    </div>
    <div class="grid grid-cols-6 text-center mx-12 border-b-2 border-black text-lg">
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">No</div>
        <div class="col-span-4 bg-gray-200 mx-3 mb-2">Pertanyaan</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Action</div>
    </div>
    @foreach ($questions as $question)
        @include('partials.show_question', [
            'count' => $count,
            'question' => $question['question_content'],
            'questionId' => $question['id'],
            'eventId' => $eventId,
        ])
        @php
            $count++;
        @endphp
    @endforeach
@endsection
