@extends('templates.base_admin')

@section('title', 'Event Details')

@section('content')
    <h1 class="mx-4 mt-10 mb-5 font-bold text-4xl text-orange-500 sm:text-3xl">Event Details</h1>

    <div class="mx-4 mt-5 sm:mx-8">
        <div class="bg-white shadow-md rounded-lg p-6 sm:p-8 space-y-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Event Information</h2>

            <!-- Event Details Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <strong class="text-gray-600">Nama Acara:</strong>
                    <p class="text-gray-700">{{ $event->event_name }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Ketua Acara:</strong>
                    <p class="text-gray-700">{{ $chairman }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Open Recruitment:</strong>
                    <p class="text-gray-700">{{ $event->recruitment_start_date }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Close Recruitment:</strong>
                    <p class="text-gray-700">{{ $event->recruitment_end_date }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Acara:</strong>
                    <p class="text-gray-700">{{ $event->event_date }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Lingkup Acara:</strong>
                    <p class="text-gray-700">{{ $event->event_scope }}</p>
                </div>
                <div>
                    <strong class="text-gray-600">Lokasi Acara:</strong>
                    <p class="text-gray-700">{{ $event->event_location }}</p>
                </div>
                <div>
                    <div>
                        <strong class="text-gray-600">Proposal (PDF):</strong>
                        <a href="{{ asset('proposals/' . $event->proposal) }}" target="_blank"
                            class="text-blue-500">View
                            Proposal</a>
                    </div>
                    <div class="mt-4">
                        <strong class="text-gray-600">RA-RMA (XLS):</strong>
                        <a href="{{ asset('raRmas/' . $event->raRma) }}" target="_blank" class="text-blue-500">View
                            RA-RMA</a>
                    </div>
                </div>
            </div>

            <!-- Divisions Section -->
            <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Divisions Available</h3>
            <ul class="list-disc pl-6 space-y-2">
                @foreach ($divisions as $div)
                    <li class="text-gray-700">{{ $div->division_name }}</li>
                @endforeach
            </ul>

            <!-- Back Button Section -->
            <div class="mt-8 text-right">
                <button onclick="window.location.href='{{ route('manage_events') }}'"
                    class="bg-gray-500 text-white font-bold px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                    Back to Manage Events
                </button>
            </div>
        </div>
    </div>
@endsection
