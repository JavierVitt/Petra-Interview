@extends('templates.base_interviewer')

@section('title', 'Set Available Schedule')

@section('content')

    <div class="mx-10">
        <form action="" method="post">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                Select Date
            </label>
            <div class="relative">
                <input type="date" id="date" class="block w-full appearance-none bg-gray-50 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm transition" />
            </div>
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                Select Time
            </label>
            <div>
                <select name="" id="">
                    <option value="08:00 - 09:00">08:00 - 09:00</option>
                    <option value="09:00 - 10:00">09:00 - 10:00</option>
                    <option value="10:00 - 11:00">10:00 - 11:00</option>
                    <option value="11:00 - 12:00">11:00 - 12:00</option>
                    <option value="12:00 - 13:00">12:00 - 13:00</option>
                    <option value="13:00 - 14:00">13:00 - 14:00</option>
                    <option value="14:00 - 15:00">14:00 - 15:00</option>
                    <option value="15:00 - 16:00">15:00 - 16:00</option>
                    <option value="16:00 - 17:00">16:00 - 17:00</option>
                    <option value="17:00 - 18:00">17:00 - 18:00</option>
                    <option value="18:00 - 19:00">18:00 - 19:00</option>
                    <option value="19:00 - 20:00">19:00 - 20:00</option>
                </select>
            </div>
            <button class="bg-black text-white" type="submit">Add</button>
        </form>

    </div>

    <div>
        <p class="text-center">Jadwal Interview</p>
        <div class="container py-8">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200  uppercase text-xl leading-normal">
                            <th class="py-3 px-6 text-center">No</th>
                            <th class="py-3 px-6 text-center">Tanggal</th>
                            <th class="py-3 px-6 text-center">Jam</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" text-lg">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">1</td>
                            <td class="py-3 px-6 text-center">01-12-2024</td>
                            <td class="py-3 px-6 text-center">10:00 AM</td>
                            <td class="py-3 px-6 text-center">
                                <button class="bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
