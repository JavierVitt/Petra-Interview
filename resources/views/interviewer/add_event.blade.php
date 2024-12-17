@extends('templates.base_interviewer')

@section('title', 'User | Landing Page')

@section('content')
    @if ($errors->any())
        <script>
            let errorMessages = @json($errors->all());
            errorMessages.forEach(message => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                });
            });
        </script>
    @endif

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
                        placeholder="Input Nama Acara Disini" required name="namaAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Open Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" required
                        name="tanggalOprec">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Close Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" required
                        name="tanggalCloserec">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 mt-4 pb-7">
                <div class="col-span-2">
                    <p class="text-xl font-bold">Deskripsi Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-32 mt-2 px-2"
                        placeholder="Input Deskripsi Acara Disini" required name="deskripsiAcara">
                </div>
                <div class="col-span-1">
                    <p class="text-xl font-bold">Tanggal Acara</p>
                    <input type="date" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Tanggal Acara Disini" required name="tanggalAcara">
                    <p class="text-xl font-bold mt-3">Lingkup Acara</p>
                    <select name="lingkupAcara" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2">
                        <option value="Intern IC">Intern IC</option>
                        <option value="Fakultas">Fakultas</option>
                        <option value="Universitas">Universitas</option>
                        <option value="Regional">Regional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ml-4 sm:ml-8 pb-7">
                <div>
                    <p class="text-xl font-bold">Lokasi Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Lokasi Acara Disini" required name="lokasiAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">Proposal Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 pt-1 pl-1 px-2" required
                        name="proposalAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">RA/RMA Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 pt-1 pl-1" required
                        name="raRmaAcara">
                </div>
            </div>
        </div>

        <div class="mx-4 sm:mx-14 bg-gray-200 rounded-xl mt-8 mb-4 pb-7">
            <div class="grid grid-cols-1 sm:grid-cols-7 gap-4">
                <p class="ml-8 py-4 font-bold text-4xl col-span-6">Divisions</p>
                <button id="addButton" class="col-span-1 bg-black text-white m-2 mr-3 rounded-xl hover:shadow-lg"
                    type="button">+ Add Division</button>
            </div>
            <div id="container"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-11 text-center mb-8 mt-4">
            <div class="col-span-3"></div>
            <div class="col-span-2 mx-4 py-2">
                <button class="bg-red-600 h-10 w-full sm:w-40 text-white rounded-md hover:shadow-xl">Cancel</button>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-2 mx-4 py-2">
                <button class="bg-green-500 h-10 w-full sm:w-40 text-white rounded-md hover:shadow-xl"
                    type="submit">Submit</button>
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
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2 " placeholder="Input Nama Divisi Disini" name="divisionName${divisionCount}" required>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id" name="interviewer${interviewerCount}" required>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount+1}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-full sm:w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id" name="interviewer${interviewerCount+1}">
                    </div>
                </div>
                <input type="hidden" name="count" value="${divisionCount}">`;

            divisionCount++;
            interviewerCount += 2;
            document.getElementById('container').insertAdjacentHTML('beforeend', newContent);
        });
    </script>
@endsection
