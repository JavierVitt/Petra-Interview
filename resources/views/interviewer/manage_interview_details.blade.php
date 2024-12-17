@extends('templates.base_interviewer')

@section('title', 'User | Manage Page')

@section('content')
    

    <!-- Header -->
    <div class="grid grid-cols-1 sm:grid-cols-5 mx-4 sm:mx-14 mt-10 mb-5 gap-4">
        <div class="sm:col-span-2">
            <p class="font-bold text-3xl sm:text-4xl text-orange-500 text-center sm:text-left">Manage Interview</p>
        </div>
        <div class="sm:col-span-3 flex justify-center items-center">
            @include('partials.manage_interview_buttons', ['eventId' => $eventId])
        </div>
    </div>

    <!-- Table Header -->
    <div class="overflow-x-auto mx-4 sm:mx-12">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">Foto</th>
                    <th class="py-3 px-6 text-center">Interviewee</th>
                    <th class="py-3 px-6 text-center">Jadwal</th>
                    <th class="py-3 px-6 text-center">Lokasi</th>
                    <th class="py-3 px-6 text-center">KHS</th>
                    <th class="py-3 px-6 text-center">SKKK</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($fotos as $index => $foto)
                    <tr class="border-b hover:bg-gray-100">
                        <!-- Foto -->
                        <td class="py-3 px-6 text-center">
                            <a href="{{ asset('profilePictures/' . $foto) }}" target="_blank">
                                <img class="w-12 h-12 rounded-full mx-auto" src="{{ asset('profilePictures/' . $foto) }}"
                                    alt="Foto">
                            </a>
                        </td>
                        <!-- Interviewee -->
                        <td class="py-3 px-6 text-center">{{ $interviewees[$index] }}</td>
                        <!-- Jadwal -->
                        <td class="py-3 px-6 text-center">{{ $jadwals[$index] }}</td>
                        <!-- Lokasi -->
                        <td class="py-3 px-6 text-center">{{ $locations[$index] }}</td>
                        <!-- KHS -->
                        <td class="py-3 px-6 text-center">
                            <a href="{{ asset('khss/' . $khss[$index]) }}" class="text-blue-500 hover:text-blue-700"
                                target="_blank">
                                View
                            </a>
                        </td>
                        <!-- SKKK -->
                        <td class="py-3 px-6 text-center">
                            <a href="{{ asset('skkks/' . $skkks[$index]) }}" class="text-blue-500 hover:text-blue-700"
                                target="_blank">
                                View
                            </a>
                        </td>
                        <!-- Actions -->
                        <td class="py-3 px-6 text-center">
                            @if ($statuss[$index] == 'Menunggu Interview')
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition"
                                    onclick="window.location.href='/do_interview/{{ $eventId }}/{{ $registrationId[$index] }}/{{ $intervieweeId[$index] }}'">
                                    Do Interview
                                </button>
                            @elseif ($statuss[$index] == 'Sedang di Proses')
                                <div class="flex justify-center gap-2">
                                    <!-- Info -->
                                    <form
                                        action="{{ route('interview_result', ['registrationId' => $registrationId[$index]]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </button>
                                    </form>
                                    <!-- Accept -->
                                    <form
                                        action="{{ route('accept_interview', ['registrationId' => $registrationId[$index]]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                    <!-- Reject -->
                                    <form
                                        action="{{ route('reject_interview', ['registrationId' => $registrationId[$index]]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            @elseif ($statuss[$index] == 'Diterima')
                                <span class="text-green-500 font-bold">Accepted</span>
                            @elseif ($statuss[$index] == 'Ditolak')
                                <span class="text-red-500 font-bold">Rejected</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
