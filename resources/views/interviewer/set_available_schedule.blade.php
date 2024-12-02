@extends('templates.base_interviewer')

@section('title', 'Set Available Schedule')

@section('content')
    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="container mx-auto px-4 py-4">
            <!-- Judul Halaman -->
            <h1 class="text-4xl font-bold text-center text-orange-500 mb-4">Set Available Schedule</h1>

            <!-- Kolom untuk Card Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-2">
                <!-- Box Status -->
                <div class="bg-red-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Tidak Bisa</h4>
                </div>
                <div class="bg-yellow-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Interview Online</h4>
                </div>
                <div class="bg-green-500 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Bisa</h4>
                </div>
                <div class="bg-gray-900 w-full p-4 rounded-lg text-white flex items-center justify-center">
                    <h4 class="font-semibold">Sudah Ada Interview</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="bg-white mt-4 p-2 rounded-lg shadow-md">
            <!-- Tanggal -->
            <div class="border-2 border-black p-2 mb-2 rounded-lg text-center">
                <h1 class="text-black text-xl">2 December 2024</h1>
            </div>

            <!-- Jadwal Jam -->
            <div class="grid grid-cols-2 gap-1">
                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>19:00-19:30</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>

                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>19:30-20:00</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>

                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>20:00-20:30</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>

                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>20:30-21:00</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>

                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>21:00-21:30</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>

                <div class=" p-1 rounded-lg flex items-center justify-between">
                    <div class="text-black text-center w-full">
                        <h1>21:30-22:00</h1>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-peinter-yellow rounded-lg text-white py-1 px-1" onclick="openModal(this)">
                        </button>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div id="statusModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Pilih Status</h3>
            <div class="flex space-x-4">
                <button class="bg-green-500 text-white py-2 px-4 rounded-lg" onclick="changeStatus('bg-green-500')">Bisa</button>
                <button class="bg-yellow-500 text-white py-2 px-4 rounded-lg" onclick="changeStatus('bg-yellow-500')">Online</button>
                <button class="bg-red-500 text-white py-2 px-4 rounded-lg" onclick="changeStatus('bg-red-500')">Tidak Bisa</button>
                <button class="bg-gray-900 text-white py-2 px-4 rounded-lg" onclick="changeStatus('bg-gray-900')">Terisi</button>
            </div>
        </div>
    </div>

    <script>
        let selectedButton;

        function openModal(button) {
            selectedButton = button;
            document.getElementById('statusModal').classList.remove('hidden');
        }

        function changeStatus(statusClass) {
            selectedButton.classList = '';
            selectedButton.classList.add(statusClass, 'rounded-lg', 'text-white', 'py-1', 'px-1');
            document.getElementById('statusModal').classList.add('hidden');
        }
    </script>
@endsection
