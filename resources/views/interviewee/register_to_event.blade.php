@extends('templates.base_interviewee')

@section('title', 'User | Manage Page')
@section('content')
    @if ($errors->any())
        <script>
            let errorMessages = @json($errors->all());
            console.log(errorMessages);
            errorMessages.forEach(message => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                    showConfirmButton: false,
                    timer: 3000
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
                timer: 3000
            });
        </script>
    @endif
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Register to Event</p>
    @foreach ($events as $event)
        @include('partials.event_banner', [
            'event_name' => $event['event_name'],
            'recruitment_start_date' => $event['recruitment_start_date'],
            'recruitment_end_date' => $event['recruitment_end_date'],
            'button_label' => 'Daftar',
            'id' => $event['id'],
            'button_route' => 'registration_form',
        ])
    @endforeach

@endsection
