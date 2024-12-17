@extends('templates.base_admin')

@section('title', 'Edit Available Schedule')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Edit Available Schedule</h1>

    <div class="mx-14 mt-5">
        <form action="{{ route('edit_available_schedule') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="schedule_date" class="block text-lg font-semibold text-gray-700">Pilih Tanggal</label>
                <input type="text" id="schedule_date" name="schedule_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2" required value="{{ old('schedule_date') }}">
            </div>

            <div class="mb-4">
                <label for="schedule_time" class="block text-lg font-semibold text-gray-700">Pilih Jam</label>
                <select name="schedule_time" id="schedule_time"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg mt-2" required value="{{ old('schedule_time') }}">
                    <option value="19:00-19:30">19:00-19:30</option>
                    <option value="19:30-20:00">19:30-20:00</option>
                    <option value="20:00-20:30">20:00-20:30</option>
                    <option value="20:30-21:00">20:30-21:00</option>
                    <option value="21:00-21:30">21:00-21:30</option>
                    <option value="21:30-22:00">21:30-22:00</option>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-orange-500 text-white py-2 px-8 rounded-xl">Update Schedule</button>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#schedule_date", {
            dateFormat: "Y-m-d",
            minDate: "today",
        });
    </script>
@endsection
