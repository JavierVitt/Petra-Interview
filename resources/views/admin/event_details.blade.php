@extends('templates.base_admin')

@section('title', 'Event Details')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Event Details</h1>

    <div class="mx-14 mt-5">
        <div class="bg-white shadow-md rounded-lg p-8 space-y-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Event Information</h2>

            <!-- Event Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong class="text-gray-600">Nama Acara:</strong>
                    <p class="text-gray-700">IRGL 2025</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Open Recruitment:</strong>
                    <p class="text-gray-700">2025-05-01</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Close Recruitment:</strong>
                    <p class="text-gray-700">2025-06-01</p>
                </div>
                <div>
                    <strong class="text-gray-600">Tanggal Acara:</strong>
                    <p class="text-gray-700">2025-07-15</p>
                </div>
                <div>
                    <strong class="text-gray-600">Lingkup Acara:</strong>
                    <p class="text-gray-700">National Competition</p>
                </div>
                <div>
                    <strong class="text-gray-600">Lokasi Acara:</strong>
                    <p class="text-gray-700">University Auditorium</p>
                </div>
                <div>
                    <strong class="text-gray-600">Ketua Acara:</strong>
                    <p class="text-gray-700">Budi Doremi</p>
                </div>
                <div>
                    <strong class="text-gray-600">Proposal (PDF):</strong>
                    <a href="{{ asset('storage/proposals/irgl2025_proposal.pdf') }}" target="_blank"
                        class="text-blue-500">Download Proposal</a>
                </div>
                <div>
                    <strong class="text-gray-600">RA-RMA (PDF):</strong>
                    <a href="{{ asset('storage/ra_rma/irgl2025_ra_rma.pdf') }}" target="_blank"
                        class="text-blue-500">Download RA-RMA</a>
                </div>
            </div>

            <!-- Divisions Section -->
            <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Divisions Available</h3>
            <ul class="list-disc pl-6 space-y-2">
                <li class="text-gray-700">Marketing</li>
                <li class="text-gray-700">Logistics</li>
                <li class="text-gray-700">Documentation</li>
                <li class="text-gray-700">Public Relations</li>
                <li class="text-gray-700">Sponsorship</li>
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