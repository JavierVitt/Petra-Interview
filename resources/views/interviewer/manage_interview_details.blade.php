@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')

    <div class="grid grid-cols-5 mx-14 mt-10 mb-5">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Manage Interview</p>
        </div>
        <div class="col-span-3 flex items-center justify-center">
            @include('partials.manage_interview_buttons', ['eventId' => $eventId])
        </div>
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
        @if ($statuss[$index] == 'Menunggu Interview')
            <div class="mt-3 grid grid-cols-8 text-center mx-12 border-b-2 border-gray-100 text-lg">
                <div class="col-span-1 mx-3 mb-2 flex justify-center items-center"><a
                        href="{{ asset('profilePictures/' . $foto) }}" target="_blank"><img class="w-10 h-10"
                            src="{{ asset('profilePictures/' . $foto) }}" alt="Foto pendaftar" ></a></div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $interviewees[$index] }}</div>
                <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">{{ $jadwals[$index] }}</div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $locations[$index] }}</div>{{-- iki gaiso up file sekan --}}
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                        href="{{ asset('khss/' . $khss[$index]) }}" target="_blank">View</a></div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                        href="{{ asset('skkks/' . $skkks[$index]) }}" target="_blank">View</a></div>
                <button class="bg-peinter-yellow rounded-2xl montserratBold mb-2"
                    onclick="window.location.href='/do_interview/{{ $eventId }}/{{ $registrationId[$index] }}/{{ $intervieweeId[$index] }}'">Do
                    Interview</button>
            </div>
        @endif
        @if ($statuss[$index] == 'Sedang di Proses')
            <div class="mt-3 grid grid-cols-8 text-center mx-12 border-b-2 border-gray-100 text-lg">
                <div class="col-span-1 mx-3 mb-2 flex justify-center items-center">
                    <a target="_blank" href="{{ asset('profilePictures/' . $foto) }}">
                        <img class="w-10 h-10" src="{{ asset('profilePictures/' . $foto) }}" alt="Apa">
                    </a>
                </div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $interviewees[$index] }}</div>
                <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">{{ $jadwals[$index] }}</div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $locations[$index] }}</div>{{-- iki gaiso up file sekan --}}
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                        href="{{ asset('khss/' . $khss[$index]) }}" target="_blank">View</a></div>
                <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                        href="{{ asset('skkks/' . $skkks[$index]) }}" target="_blank">View</a></div>
                <div class="col-span-1"> {{-- Button INFO/ACC/REJECT --}}
                    <form action="{{ route('interview_result',['registrationId'=> $registrationId[$index]]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white font-bold px-4 py-2 rounded-lg">
                        <i class="fa-solid fa-circle-info"></i>
                    </button></form>
                    <form action="{{ route('accept_interview',['registrationId'=> $registrationId[$index]]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white font-bold px-4 py-2 rounded-lg">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                    <form action="{{ route('reject_interview',['registrationId'=> $registrationId[$index]]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white font-bold px-4 py-2 rounded-lg">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </form>
                    
                </div>
            </div>
    @endif
    @if ($statuss[$index] == 'Diterima')
    <div class="mt-3 grid grid-cols-8 text-center mx-12 border-b-2 border-gray-100 text-lg">
        <div class="col-span-1 mx-3 mb-2 flex justify-center items-center"><a
                href="{{ asset('profilePictures/' . $foto) }}"><img class="w-10 h-10"
                    src="{{ asset('profilePictures/' . $foto) }}" alt="Apa"></a></div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $interviewees[$index] }}</div>
        <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">{{ $jadwals[$index] }}</div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $locations[$index] }}</div>{{-- iki gaiso up file sekan --}}
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                href="{{ asset('khss/' . $khss[$index]) }}" target="_blank">View</a></div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                href="{{ asset('skkks/' . $skkks[$index]) }}" target="_blank">View</a></div>
        <div class="col-span-1"> {{-- ACCEPTED --}}
            <td class="border border-gray-300 px-4 py-2 text-center">
                <span class="text-green-500 font-bold">Accepted</span>
            </td>
        </div>
    </div>
    @endif
    @if ($statuss[$index] == 'Ditolak')
    <div class="mt-3 grid grid-cols-8 text-center mx-12 border-b-2 border-gray-100 text-lg">
        <div class="col-span-1 mx-3 mb-2 flex justify-center items-center"><a
                href="{{ asset('profilePictures/' . $foto) }}"><img class="w-10 h-10"
                    src="{{ asset('profilePictures/' . $foto) }}" alt="Apa"></a></div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $interviewees[$index] }}</div>
        <div class="col-span-2 bg-gray-300 mx-3 mb-2 py-2">{{ $jadwals[$index] }}</div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2">{{ $locations[$index] }}</div>{{-- iki gaiso up file sekan --}}
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                href="{{ asset('khss/' . $khss[$index]) }}" target="_blank">View</a></div>
        <div class="col-span-1 bg-gray-300 mx-3 mb-2 py-2 text-blue-500 hover:text-blue-700"><a
                href="{{ asset('skkks/' . $skkks[$index]) }}" target="_blank">View</a></div>
        <div class="col-span-1"> {{-- REJECTED --}}
            <td class="border border-gray-300 mb-2 py-2 text-center">
                <span class="text-red-500 font-bold">Rejected</span>
            </td>
        </div>
    </div>
    @endif
    @endforeach

    {{-- DUMMY BUTTON ACTION --}}

@endsection
