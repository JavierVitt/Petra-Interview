@extends('templates.base_interviewee')

@section('title', 'User | Manage Page')

@section('content')

    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Registration</p>
    <div class="bg-gray-300 mx-8 p-5 rounded-lg">
        <p class="text-center font-black mb-8 text-4xl">{{ $event['event_name'] }}</p>
        <div class="grid grid-cols-2 mx-10">
            <div class="border-black border-r p-5 pr-8">
                <p class="font-bold text-xl mb-4">Description</p>
                <p class="text-justify">{{ $event['event_description'] }}</p>
                <p class="font-bold text-xl">Division Available</p>

                <div class="grid grid-cols-3 text-center">
                    @foreach ($event['divisions'] as $division)
                        <div class="col-span-1 flex justify-center items-center px-1">
                            <p class=" bg-white rounded-lg py-3 my-2 w-full text-lg font-bold">
                                {{ $division['division_name'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center items-center p-5 pl-20">
                <div class="grid grid-cols-2">
                    <div>
                        {{-- ini entar default values nya diisi pake data user yang diambil dari middleware. entar aja pas udah ngerjain middleware. --}}
                        <p class="font-bold">Nama</p>
                        <input type="text" name="nama" class="rounded-lg h-10 w-11/12 px-3" value="{{ $userData['name'] }}">
                        <p class="font-bold mt-3">IPK</p>
                        <input type="text" name="ipk" class="rounded-lg h-10 w-11/12 px-3" value="" required>
                        <p class="font-bold mt-3">Pilihan Divisi 2</p>
                        <select name="divisi1" id="" class="rounded-lg h-10 w-11/12 px-3">
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">{{ $division['division_name'] }}</option>
                            @endforeach
                        </select>
                        <p class="font-bold mt-3">Transkrip KHS</p>
                        <input type="file" name="khs" class="rounded-lg h-10 w-11/12 px-3 pt-1 bg-white" value="" required>
                    </div>
                    <div>
                        <p class="font-bold">NRP</p>
                        <input type="text" class="rounded-lg h-10 w-11/12 px-3" name="nrp"
                            value="{{ Str::before($userData['email'], '@') }}">
                        <p class="font-bold mt-3">Pilihan Divisi 1</p>
                        <select name="divisi2" id="divisi2" class="rounded-lg h-10 w-11/12 px-3">
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">{{ $division['division_name'] }}</option>
                            @endforeach
                        </select>
                        <p class="font-bold mt-3">Jadwal Interview</p>
                        <select name="jadwalInterview" id="" class="rounded-lg h-10 w-11/12 px-3">
                            <option value="">17.30-18.30</option>
                            <option value="">17.30-18.30</option>
                            <option value="">17.30-18.30</option>
                            <option value="">17.30-18.30</option>
                        </select>
                        <p class="font-bold mt-3">Transkrip SKKK</p>
                        <input type="file" name="skkk" class="rounded-lg h-10 w-11/12 px-3 pt-1 bg-white" value="" required>
                        <div class="text-center pt-10">
                            <button class="bg-black text-white p-3 px-12 rounded-xl font-bold text-2xl hover:shadow-xl"
                                type="submit">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <p class="text-gray-300">Sip</p>
    </div>
    <div class="bg-white">
        <p class="text-white">k</p>
    </div>
@endsection
