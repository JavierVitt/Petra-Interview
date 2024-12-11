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


    <div class="grid grid-cols-5 mx-14 mt-10 mb-1">
        <div class=" col-span-2">
            <p class="font-bold text-4xl text-orange-500">Set Available Schedule</p>
        </div>
        <div class="col-span-3 flex items-center justify-center">
            @include('partials.manage_interview_buttons', ['eventId' => $eventId])
        </div>
    </div>

    <div class="mx-10 mt-1">
        <!-- Form Set Available Schedule -->
        <form action="{{ route('set_available_schedule', ['eventId' => $eventId]) }}" method="POST">
            @csrf

            <div class="grid grid-cols-3 mx-4 justify-between">
                <!-- Date Picker -->
                <div class="mb-6 mx-1">
                    <label for="date" class="block text-lg font-semibold text-gray-700 mb-2">
                        Select Date
                    </label>
                    <input type="date" id="date" name="date"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm transition"
                        required />
                </div>

                <!-- Time Picker -->
                <div class="mb-6 mx-1">
                    <label for="time" class="block text-lg font-semibold text-gray-700 mb-2">
                        Select Time Slot
                    </label>
                    <select name="time" id="time"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm transition"
                        required>
                        <option value="08:00 - 09:00">08:00 - 09:00</option>
                        <option value="09:00 - 10:00">09:00 - 10:00</option>
                        <option value="10:00 - 11:00">10:00 - 11:00</option>
                        <option value="11:00 - 12:00">11:00 - 12:00</option>
                        <option value="12:00 - 13:00">12:00 - 13:00</option>
                        <option value="13:00 - 14:00">13:00 - 14:00</option>
                        <option value="14:00 - 15:00">14:00 - 15:00</option>
                        <option value="15:00 - 16:00">15:00 - 16:00</option>
                        <option value="16:00 - 17:00">16:00 - 17:00</option>
                    </select>
                </div>

                {{-- Set Interview Location --}}
                <div class="mb-6 mx-1">
                    <label for="text-input" class="block text-lg font-semibold text-gray-700 mb-2">
                        Enter Location
                    </label>
                    <input type="text" id="text-input" name="text-input"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm transition"
                        placeholder="Input Interview Location" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-6 mx-4 flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Add Schedule
                </button>
            </div>
        </form>
    </div>


    <div>
        <p class="text-center font-bold text-orange-500 text-2xl">Jadwal Interview</p>
        <div class="mx-8 rounded-lg ">
            <div class="container py-2 bg-orange-300items-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-orange-100 shadow-md rounded-lg ">
                        <thead>
                            <tr class="bg-gray-100 rounded-lg uppercase text-xl leading-normal">
                                <th class="py-3 px-6 text-center">No</th>
                                <th class="py-3 px-6 text-center">Tanggal</th>
                                <th class="py-3 px-6 text-center">Jam</th>
                                <th class="py-3 px-6 text-center">Lokasi</th>
                                <th class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" text-gray-700 text-base">
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($schedules as $index => $schedule)
                                @include('partials.interviewer_schedule', [
                                    'id' => $schedule['id'],
                                    'check' => $checkSchedules[$index],
                                    'count' => $count,
                                    'date' => $schedule['interview_date'],
                                    'time' => $schedule['interview_time'],
                                ])
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                            <!-- ENTRY DATA DUMMY -->
                            <tr class="border-b">
                                <td class="py-3 px-6 text-center">1</td>
                                <td class="py-3 px-6 text-center">2024-12-15</td>
                                <td class="py-3 px-6 text-center">10:00 - 11:00</td>
                                <td class="py-3 px-6 text-center">Lokasi Meeting Room dummy</td> <!-- Dummy Lokasi -->
                                <td class="py-3 px-6 text-center">
                                    <button class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
