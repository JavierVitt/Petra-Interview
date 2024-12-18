@extends('templates.base_interviewer')

@section('title', 'User | Landing Page')

@section('content')
    <div class="mx-4 sm:mx-14 mt-10 mb-5">
        <p class="font-bold text-orange-500 text-4xl text-center sm:text-left">Add Event</p>
    </div>
    <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mx-4 sm:mx-14 bg-gray-200 rounded-xl p-5">
            <p class="ml-4 sm:ml-8 pt-4 font-bold text-4xl">Event</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 mt-4">
                <div>
                    <p class="text-xl font-bold">Nama Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Nama Acara Disini" value="{{ old('namaAcara') }}" required name="namaAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Open Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" required
                        name="tanggalOprec" value="{{ old('tanggalOprec') }}">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Close Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" required
                        name="tanggalCloserec" value="{{ old('tanggalCloserec') }}">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 mt-4 pb-7">
                <div class="col-span-2">
                    <p class="text-xl font-bold">Deskripsi Acara</p>
                    <textarea class="rounded-md bg-gray-300 w-full sm:w-11/12 h-32 mt-2 px-2" placeholder="Input Deskripsi Acara Disini"
                        required name="deskripsiAcara">{{ old('deskripsiAcara') }}</textarea>
                </div>
                <div class="col-span-1">
                    <p class="text-xl font-bold">Tanggal Acara</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" required
                        name="tanggalAcara" value="{{ old('tanggalAcara') }}">
                    <p class="text-xl font-bold mt-3">Lingkup Acara</p>
                    <select name="lingkupAcara" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2">
                        <option value="Intern IC" @selected(old('lingkupAcara') == 'Intern IC')>Intern IC</option>
                        <option value="Fakultas" @selected(old('lingkupAcara') == 'Fakultas')>Fakultas</option>
                        <option value="Universitas" @selected(old('lingkupAcara') == 'Universitas')>Universitas</option>
                        <option value="Regional" @selected(old('lingkupAcara') == 'Regional')>Regional</option>
                        <option value="Nasional" @selected(old('lingkupAcara') == 'Nasional')>Nasional</option>
                        <option value="Internasional" @selected(old('lingkupAcara') == 'Internasional')>Internasional</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 pb-7">
                <div>
                    <p class="text-xl font-bold">Lokasi Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Lokasi Acara Disini" required name="lokasiAcara"
                        value="{{ old('lokasiAcara') }}">
                </div>
                <div>
                    <p class="text-xl font-bold">Proposal Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 pt-1 pl-1 px-2 block"
                        name="proposalAcara" required>
                    <small class="text-gray-500 text-sm block">Input type must be: .pdf</small>
                </div>
                <div>
                    <p class="text-xl font-bold">RA/RMA Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 pt-1 pl-1 block"
                        name="raRmaAcara" required>
                    <small class="text-gray-500 text-sm block">Input type must be: .pdf</small>
                </div>

            </div>
        </div>

        <div class="mx-4 sm:mx-14 bg-gray-200 rounded-xl mt-8 mb-4 pb-7">
            <div class="grid grid-cols-1 sm:grid-cols-7 py-2 px-2 gap-4">
                <p class="ml-8 py-4 font-bold text-4xl col-span-6">Divisions</p>
                <button id="addButton"
                    class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 transition w-full lg:w-auto"
                    type="button">
                    + Add Division
                </button>
            </div>
            <div id="container"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-11 text-center mb-8 mt-4">
            <div class="col-span-3"></div>
            <div class="col-span-2 mx-4 py-2">
                <button
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 transition w-full sm:w-40">
                    Cancel
                </button>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-2 mx-4 py-2">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition w-full sm:w-40"
                    type="submit">
                    Submit
                </button>
            </div>
            <div class="col-span-3"></div>
        </div>

    </form>
    <script>
        let interviewerCount = 1;
        let divisionCount = 1;

        document.getElementById('addButton').addEventListener('click', function() {
            const newContent = `
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 mt-4 mx-4">
                    <div>
                        <p class="text-xl font-bold">Nama Divisi</p>
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" 
                            placeholder="Input Nama Divisi Disini" name="divisionName${divisionCount}" required>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" 
                            placeholder="@john.petra.ac.id" name="interviewer${interviewerCount}" required>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount + 1}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" 
                            placeholder="@john.petra.ac.id" name="interviewer${interviewerCount + 1}">
                    </div>
                </div>`;

            divisionCount++;
            interviewerCount += 2;

            document.getElementById('container').insertAdjacentHTML('beforeend', newContent);
        });
    </script>
@endsection
