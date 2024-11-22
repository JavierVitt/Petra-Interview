@extends('templates.base_admin')

@section('title', 'Manage Events')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Manage Events</h1>

    <div class="mx-14 mt-5">
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-center">Nomor</th>
                    <th class="border border-gray-300 px-4 py-2">Applicants</th>
                    <th class="border border-gray-300 px-4 py-2">Acara</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">1</td>
                    <td class="border border-gray-300 px-4 py-2">Budi Doremi</td>
                    <td class="border border-gray-300 px-4 py-2">IRGL 2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <button onclick="window.location.href='{{ route('detail_event') }}'"
                            class="bg-gray-500 text-white font-bold px-4 py-2 rounded-lg">
                            Review
                        </button>
                    </td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">2</td>
                    <td class="border border-gray-300 px-4 py-2">Bella Susanto</td>
                    <td class="border border-gray-300 px-4 py-2">WGGP 2024</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <span class="text-green-500 font-bold">Diterima</span>
                    </td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">3</td>
                    <td class="border border-gray-300 px-4 py-2">fakeuser123</td>
                    <td class="border border-gray-300 px-4 py-2">EPICLAIR 2024</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <span class="text-red-500 font-bold">Ditolak</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
