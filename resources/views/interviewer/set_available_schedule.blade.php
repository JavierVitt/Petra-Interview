@extends('templates.base_interviewer')

@section('title', 'Set Available Schedule')

@section('content')

    @if ($errors->any())
        <script>
            let errorMessages = @json($errors->all());
            errorMessages.forEach(message => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                    confirmButtonText: "Okay"
                });
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <!-- Page Title -->
    <div class="mx-4 sm:mx-14 mt-10 mb-6 flex flex-col sm:flex-row justify-between items-center">
        <p class="font-bold text-2xl sm:text-4xl text-orange-500 mb-4 sm:mb-0">
            Set Available Schedule
        </p>
        @include('partials.manage_interview_buttons', ['eventId' => $eventId])
    </div>

    <!-- Form Section -->
    <div class="bg-gray-50 mx-4 sm:mx-10 p-4 sm:p-6 rounded-lg shadow-lg">
        <form action="{{ route('set_available_schedule', ['eventId' => $eventId]) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Date Picker -->
                <div>
                    <label for="date" class="block text-lg font-semibold text-gray-700 mb-2">
                        Select Date
                    </label>
                    <input type="date" id="date" name="date"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm"
                        required />
                </div>

                <!-- Time Picker -->
                <div>
                    <label for="time" class="block text-lg font-semibold text-gray-700 mb-2">
                        Select Time Slot
                    </label>
                    <select name="time" id="time"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm"
                        required>
                        @foreach (['08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '12:00 - 13:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00', '16:00 - 17:00'] as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Location Input -->
                <div>
                    <label for="location" class="block text-lg font-semibold text-gray-700 mb-2">
                        Enter Location
                    </label>
                    <input autocomplete="off" type="text" id="location" name="location"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm"
                        placeholder="Input Interview Location" required />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    Add Schedule
                </button>
            </div>
        </form>
    </div>

    <!-- Schedule Table -->
    <div class="mx-4 sm:mx-10 mt-10">
        <p class="text-center font-bold text-orange-500 text-2xl mb-4">Interview Schedule</p>

        <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
            <table class="min-w-full bg-white text-gray-700 rounded-lg">
                <thead class="bg-gray-200 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-4 text-center">No</th>
                        <th class="py-3 px-4 text-center">Tanggal</th>
                        <th class="py-3 px-4 text-center">Jam</th>
                        <th class="py-3 px-4 text-center">Lokasi</th>
                        <th class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm sm:text-base">
                    @php $count = 1; @endphp
                    @foreach ($schedules as $index => $schedule)
                        @include('partials.interviewer_schedule', [
                            'id' => $schedule['id'],
                            'check' => $checkSchedules[$index],
                            'count' => $count,
                            'date' => $schedule['interview_date'],
                            'time' => $schedule['interview_time'],
                            'location' => $schedule['interview_location']
                        ])
                        @php $count += 1; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
