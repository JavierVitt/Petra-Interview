@extends('templates.base_interviewer')

@section('title', 'User | Landing Page')

@section('content')
    @if ($errors->any())
        <script>
            // Pass errors to JavaScript
            let errorMessages = @json($errors->all());
            // Display SweetAlert with the error messages
            errorMessages.forEach(message => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                });
            });
        </script>
    @endif

    <div class="grid grid-cols-2 mx-14 mt-10 mb-5">
        <p class="font-bold text-orange-500 text-4xl">Add Event</p>
    </div>
    <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mx-14 bg-gray-200 rounded-xl">
            <p class="ml-8 pt-4 font-bold text-4xl">Event</p>
            <div class="grid grid-cols-3 ml-8 mt-4">
                <div>
                    <p class="text-xl font-bold">Nama Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Nama Acara Disini" required name="namaAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Open Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" required
                        name="tanggalOprec">
                </div>
                <div>
                    <p class="text-xl font-bold">Tanggal Close Recruitment</p>
                    <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" required
                        name="tanggalCloserec">
                </div>
            </div>
            <div class="grid grid-cols-3 ml-8 mt-4 pb-7">
                <div class="col-span-2">
                    <p class="text-xl font-bold">Deskripsi Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-32 mt-2 px-2"
                        placeholder="Input Deskripsi Acara Disini" required name="deskripsiAcara">
                </div>
                <div class="col-span-1">
                    <p class="text-xl font-bold">Tanggal Acara</p>
                    <input type="date" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Tanggal Acara Disini" required name="tanggalAcara">
                    <p class="text-xl font-bold mt-3">Lingkup Acara</p>
                    <select name="lingkupAcara" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2  px-2">
                        <option value="Intern IC">Intern IC</option>
                        <option value="Fakultas">Fakultas</option>
                        <option value="Universitas">Universitas</option>
                        <option value="Regional">Regional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                    {{-- <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2  px-2"
                        placeholder="Input Lingkup Acara Disini" name="lingkupAcara" required> --}}
                </div>
            </div>
            <div class="grid grid-cols-3 ml-8 pb-7">
                <div>
                    <p class="text-xl font-bold">Lokasi Acara</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2"
                        placeholder="Input Lokasi Acara Disini" required name="lokasiAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">Proposal Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 pt-1 pl-1 px-2" required
                        name="proposalAcara">
                </div>
                <div>
                    <p class="text-xl font-bold">RA/RMA Acara</p>
                    <input type="file" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 pt-1 pl-1" required
                        name="raRmaAcara">
                </div>
            </div>
        </div>

        <div class="mx-14 bg-gray-200 rounded-xl mt-8 mb-4 pb-7">
            <div class="grid grid-cols-7">
                <p class="ml-8 py-4 font-bold text-4xl col-span-6">Divisions</p>
                <button id="addButton" class="col-span-1 bg-black text-white m-2 mr-3 rounded-xl hover:shadow-lg"
                    type="button">+ Add Division</button>
            </div>
            <div id="container">

            </div>
        </div>
        <div class="grid grid-cols-11 text-center mb-8 mt-4">
            <div class="col-span-3"></div>
            <div class="col-span-2">
                <button class=" bg-red-600 h-10 w-40 text-white rounded-md hover:shadow-xl">Cancel</button>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-2">
                <button class=" bg-green-500 h-10 w-40 text-white rounded-md hover:shadow-xl" type="submit">Submit</button>
            </div>
            <div class="col-span-3"></div>
        </div>
    </form>
    <script>
        let interviewerCount = 1; // Counter for interviewer names
        let divisionCount = 1;
        let divisions = []; // Array to store division data
        let interviewers = []; // Array to store interviewer names

        document.getElementById('addButton').addEventListener('click', function() {
            // Increment the counter by 2 (because two new inputs for Interviewers are added)

            // Create the new division content using the updated interviewerCount
            const newContent = `
            <div class="grid grid-cols-3 ml-8 mt-4">
                <div>
                    <p class="text-xl font-bold">Nama Divisi</p>
                    <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="Input Nama Divisi Disini" id="divisionName${divisionCount}" name="divisionName${divisionCount}" required>
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id" id="interviewer${interviewerCount}" name="interviewer${interviewerCount}" required> 
                    </div>
                    <div>
                        <p class="text-xl font-bold">Interviewer ${interviewerCount+1}</p>
                        <input type="text" class="rounded-md bg-gray-300 w-11/12 h-10 mt-2 px-2" placeholder="@john.petra.ac.id" id="interviewer${interviewerCount+1}" name="interviewer${interviewerCount+1}"> 
                    </div>
            </div>
            <input type="hidden" name="count" value="${divisionCount}">`;

            // Add new content to the container
            interviewerCount += 2;
            divisionCount += 1;
            document.getElementById('container').insertAdjacentHTML('beforeend', newContent);

            // Push division and interviewer data into their respective arrays
            let divisionName = document.querySelector(`#divisionName${divisionCount}`).value;
            let interviewer1 = document.querySelector(`#interviewer${interviewerCount}`).value;
            let interviewer2 = document.querySelector(`#interviewer${interviewerCount+1}`).value;

            // Store the division name and interviewers in the arrays
            divisions.push(divisionName);
            interviewers.push([interviewer1, interviewer2]);
        });
    </script>


@endsection
