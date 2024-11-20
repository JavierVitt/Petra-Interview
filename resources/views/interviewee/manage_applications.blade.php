@extends('templates.base_interviewee')

@section('title', 'User | Manage Applications')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">View Applications</h1>

    <div class="mx-14 mt-5">
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-center">Nomor</th>
                    <th class="border border-gray-300 px-4 py-2">Interviewer</th>
                    <th class="border border-gray-300 px-4 py-2">Jadwal</th>
                    <th class="border border-gray-300 px-4 py-2">Tempat</th>
                    <th class="border border-gray-300 px-4 py-2">Acara</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">1</td>
                    <td class="border border-gray-300 px-4 py-2">Budi Doremi</td>
                    <td class="border border-gray-300 px-4 py-2">Senin, 28 November 2024, 13.30-14.30</td>
                    <td class="border border-gray-300 px-4 py-2">Selasar P1</td>
                    <td class="border border-gray-300 px-4 py-2">IRGL 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <span class="bg-green-500 text-white px-4 py-2 rounded-lg">Diterima</span>
                    </td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">2</td>
                    <td class="border border-gray-300 px-4 py-2">Bella Susanto</td>
                    <td class="border border-gray-300 px-4 py-2">Senin, 29 November 2024, 13.30-14.30</td>
                    <td class="border border-gray-300 px-4 py-2">Selasar P2</td>
                    <td class="border border-gray-300 px-4 py-2">IRGL 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <span class="bg-red-500 text-white px-4 py-2 rounded-lg">Ditolak</span>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">3</td>
                    <td class="border border-gray-300 px-4 py-2">Doni Deni</td>
                    <td class="border border-gray-300 px-4 py-2">Senin, 29 November 2024, 14.30-15.30</td>
                    <td class="border border-gray-300 px-4 py-2">Selasar P2</td>
                    <td class="border border-gray-300 px-4 py-2">IRGL 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Belum Interview</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
