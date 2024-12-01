@extends('templates.base_admin')

@section('title', 'Set Available Schedule')

@section('content')
    <h1 class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Set Available Schedule</h1>

    <div class="mx-14 mt-5">
        <form action="#" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Date Picker -->
                <div class="flex flex-col">
                    <label for="date" class="text-lg font-semibold">Pilih Tanggal</label>
                    <input type="date" id="date" name="date" class="py-2 px-4 border border-gray-300 rounded-lg"
                        required>
                </div>

                <!-- Time Picker -->
                <div class="flex flex-col">
                    <label for="time" class="text-lg font-semibold">Pilih Jam</label>
                    <select id="time" name="time" class="py-2 px-4 border border-gray-300 rounded-lg" required>
                        <option value="19:00-19:30">19:00-19:30</option>
                        <option value="19:30-20:00">19:30-20:00</option>
                        <option value="20:00-20:30">20:00-20:30</option>
                        <option value="20:30-21:00">20:30-21:00</option>
                        <option value="21:00-21:30">21:00-21:30</option>
                        <option value="21:30-22:00">21:30-22:00</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-orange-500 py-2 px-6 rounded-xl text-white text-lg font-bold hover:bg-orange-600">
                        Set Jadwal
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
