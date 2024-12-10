@extends('templates.base_admin')

@section('title', 'Manage Events')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Manage Events</h1>

    <div class="mx-14 mt-5">
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-center">Nomor</th>
                    <th class="border border-gray-300 px-4 py-2">Acara</th>
                    <th class="border border-gray-300 px-4 py-2">Applicants</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Review</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                    <tr class="bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center font-bold text-2xl">{{ $index+1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $event->event_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $applicants[$index] }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button onclick="window.location.href='{{ route('detail_event',['event_id' => $event->id]) }}'"
                                class="bg-gray-500 text-white font-bold px-4 py-2 rounded-lg">
                                Review
                            </button>
                        </td>
                        @if ($event->status == 0)
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <div class="flex justify-center space-x-2">
                                <form action="{{ route('acc_event',['event_id' => $event->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white font-bold px-4 py-2 rounded-lg">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                                
                                <form action="{{ route('rej_event',['event_id' => $event->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white font-bold px-4 py-2 rounded-lg">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @else
                            @if ($event->status == 1)
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <span class="text-green-500 font-bold">Accepted</span>
                                </td>
                            @else
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <span class="text-red-500 font-bold">Rejected</span>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
