@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')
    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        @include('partials.manage_interview_buttons', ['eventId' => $eventId])
    </div>
    <div class="grid grid-cols-8 text-center align-middle mx-12 border-b-2 border-black text-lg">
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Foto</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Interviewee</div>
        <div class="col-span-2 bg-gray-200 mx-3 mb-2">Jadwal</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Lokasi</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">KHS</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">SKKK</div>
        <div class="col-span-1 bg-gray-200 mx-3 mb-2">Action</div>
    </div>
    @foreach ($fotos as $index => $foto)
        <div class="mt-3 grid grid-cols-8 text-center mx-12 border-b-2 border-gray-100 text-lg">
            <div class="col-span-1 mx-3 mb-2 flex justify-center items-center"><a href="{{ asset('profilePictures/'.$foto) }}"><img class="w-10 h-10" src="{{ asset('profilePictures/'.$foto) }}" alt="Apa"></a></div>
            <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $interviewees[$index] }}</div>
            <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">{{ $jadwals[$index] }}</div>
            <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">Selasar P2</div>{{-- iki gaiso up file sekan --}}
            <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a href="{{ asset('khss/'.$khss[$index]) }}"
                    target="_blank">View</a></div>
            <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a href="{{ asset('skkks/'.$skkks[$index]) }}"
                    target="_blank">View</a></div>
            <button class="bg-peinter-yellow rounded-2xl montserratBold"
                onclick="window.location.href='/do_interview/{{ $eventId }}/{{ $registrationId[$index] }}/{{ $intervieweeId[$index] }}'">Do Interview</button>
        </div>
    @endforeach
@endsection
