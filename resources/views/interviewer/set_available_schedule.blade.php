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

    <div class="grid grid-cols-2 mx-14 mt-1 mb-1">
        <p class="font-bold text-orange-500 text-4xl">Set Available Schedule</p>
    </div>

    <div class="mx-10 mt-1">
        <!-- Form Set Available Schedule -->
        <form action="{{ route('set_available_schedule', ['eventId' => $eventId]) }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 mx-4 justify-between">
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
            <div class="container py-2 items-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg ">
                        <thead>
                            <tr class="bg-gray-200 rounded-lg uppercase text-xl leading-normal">
                                <th class="py-3 px-6 text-center">No</th>
                                <th class="py-3 px-6 text-center">Tanggal</th>
                                <th class="py-3 px-6 text-center">Jam</th>
                                <th class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" text-gray-700 text-base">
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($schedules as $schedule)
                                @include('partials.interviewer_schedule', [
                                    'count' => $count,
                                    'date' => $schedule['interview_date'],
                                    'time' => $schedule['interview_time'],
                                ])
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
