@extends('templates.base_admin')

@section('title', 'Manage Events')

@section('content')
    <!-- Title -->
    <h1 class="mx-4 sm:mx-14 mt-10 mb-5 font-bold text-3xl sm:text-4xl text-orange-500 text-center sm:text-left">
        Manage Events
    </h1>

    <!-- Scrollable Table Container -->
    <div class="mx-4 sm:mx-14 mt-5 overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-left min-w-max">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-sm sm:text-base">
                    <th class="border border-gray-300 px-4 py-2 text-center">Nomor</th>
                    <th class="border border-gray-300 px-4 py-2">Acara</th>
                    <th class="border border-gray-300 px-4 py-2">Applicants</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Review</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                    <tr class="bg-gray-50 even:bg-gray-100 hover:bg-gray-200 transition">
                        <!-- Nomor -->
                        <td class="border border-gray-300 px-4 py-2 text-center font-bold text-lg sm:text-2xl">
                            {{ $index + 1 }}
                        </td>

                        <!-- Event Name -->
                        <td class="border border-gray-300 px-4 py-2 text-sm sm:text-base">
                            {{ $event->event_name }}
                        </td>

                        <!-- Applicants -->
                        <td class="border border-gray-300 px-4 py-2 text-sm sm:text-base">
                            {{ $applicants[$index] }}
                        </td>

                        <!-- Review Button -->
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button onclick="window.location.href='{{ route('detail_event', ['event_id' => $event->id]) }}'"
                                class="bg-gray-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                Review
                            </button>
                        </td>

                        <!-- Action Buttons -->
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            @if ($event->status == 0)
                                <div class="flex justify-center space-x-2">
                                    <!-- Accept Button -->
                                    <form action="{{ route('acc_event', ['event_id' => $event->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>

                                    <!-- Reject Button -->
                                    <form action="{{ route('rej_event', ['event_id' => $event->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white font-bold px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                @if ($event->status == 1)
                                    <span class="text-green-500 font-bold">Accepted</span>
                                @else
                                    <span class="text-red-500 font-bold">Rejected</span>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
