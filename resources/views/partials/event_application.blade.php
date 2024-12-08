{{-- Asset --}}
{{-- Pake status ae
0 : Belum Interview
1 : Sedang Di Proses
2 : Diterima
3 : Ditolak --}}
{{-- <span class="bg-gray-500 text-white px-4 py-2 rounded-lg">Sedang Di Proses</span>
<span class="bg-green-500 text-white px-4 py-2 rounded-lg">Diterima</span>
<span class="bg-red-500 text-white px-4 py-2 rounded-lg">Ditolak</span>
<span class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Belum Interview</span> --}}

<tr class="bg-gray-100">
    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">{{ $count }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $interviewerName }}</td>
    <td class="border border-gray-300 px-4 py-2">{{ $jadwalInterview }}</td>
    <td class="border border-gray-300 px-4 py-2">Selasar P2</td>
    <td class="border border-gray-300 px-4 py-2">{{ $eventName }}</td>
    @if ($status == 'Ditolak')
    <td class="border border-gray-300 px-4 py-2 text-center">
        <span class="bg-red-500 text-white px-4 py-2 rounded-lg">Ditolak</span>
    </td>
    @endif
    @if ($status == 'Menunggu Interview')
    <td class="border border-gray-300 px-4 py-2 text-center">
        <span class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Menunggu Interview</span>
    </td>
    @endif
    @if ($status == 'Sedang di Proses')
    <td class="border border-gray-300 px-4 py-2 text-center">
        <span class="bg-gray-500 text-white px-4 py-2 rounded-lg">Sedang Di Proses</span>
    </td>
    @endif
    @if ($status == 'Diterima')
    <td class="border border-gray-300 px-4 py-2 text-center">
        <span class="bg-green-500 text-white px-4 py-2 rounded-lg">Diterima</span>
    </td>
    @endif
</tr>