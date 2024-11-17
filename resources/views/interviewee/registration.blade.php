@extends('templates.base')

@section('title', 'User | Manage Page')

@section('content')
    @include('navbar.navbar')
    <p class="mx-14 mt-10 mb-5 font-bold text-4xl text-orange-500">Registration</p>
    <div class="bg-gray-300 mx-8 rounded-lg">
        <p class="text-center pt-4 mb-8 font-bold text-2xl">Welcome Grateful Generation Program Studi Informatika 2025</p>
        <div class="grid grid-cols-2 mx-10">
            <div class="border-black border-r">
                <p class="font-bold text-xl">Description</p>
                <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore officiis illo ex, dolorum sequi eum
                    praesentium libero recusandae porro tenetur pariatur. Aperiam repellat reiciendis sit voluptatibus
                    distinctio fuga dolorem natus id deleniti sunt, et sed dolores nemo non blanditiis perferendis sapiente
                    at!
                    Nemo velit illo dicta, eum expedita magni maiores, ratione sint quasi doloribus delectus totam,
                    inventore
                    praesentium odio deleniti reprehenderit nam. Voluptas molestiae harum aliquid, sed repellat ab libero
                    cupiditate hic maxime dolor facere, consequatur, iusto illo quaerat non aut necessitatibus quis iste.
                    Nobis
                    tempore eveniet recusandae nisi excepturi! Aperiam repellat assumenda corporis in amet praesentium
                    tempore
                    aliquid eos.</p>
                <p class="mt-6 font-bold text-xl">Division Available</p>
                <div class="grid grid-cols-3 text-center">
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold">Transkap</p>
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold">Acara</p>
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold">IT</p>
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold mb-8">Creative</p>
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold mb-8">Sekonkes</p>
                    <p class="mt-6 bg-white rounded-lg py-3 mx-10 text-lg font-bold mb-8">Public Relation</p>
                </div>
            </div>
            <div class="grid grid-cols-2 ml-4">
                <div>
                    <p class="font-bold">Nama</p>
                    <input type="text" class="rounded-lg h-10 w-11/12 px-3">
                    <p class="font-bold mt-3">IPK</p>
                    <input type="text" class="rounded-lg h-10 w-11/12 px-3">
                    <p class="font-bold mt-3">Pilihan Divisi 2</p>
                    <input type="text" class="rounded-lg h-10 w-11/12 px-3">
                </div>
                <div>
                    <p class="font-bold">NRP</p>
                    <input type="text" class="rounded-lg h-10 w-11/12 px-3">
                    <p class="font-bold mt-3">Pilihan Divisi 1</p>
                    <input type="text" class="rounded-lg h-10 w-11/12 px-3">
                    <p class="font-bold mt-3">Jadwal Interview</p>
                    <select name="" id="" class="rounded-lg h-10 w-11/12 px-3">
                        <option value="">17.30-18.30</option>
                        <option value="">17.30-18.30</option>
                        <option value="">17.30-18.30</option>
                        <option value="">17.30-18.30</option>
                    </select>
                    <div class="text-center pt-16">
                        <button class="bg-black text-white px-12 py-4 mt-10 rounded-xl hover:shadow-xl">Daftar</button>
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
