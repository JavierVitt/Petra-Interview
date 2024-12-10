@extends('templates/base_general')

@section('title', 'User | Signup')


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
    @if(session('success'))
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
        </script>
    @endif
    <div class="flex flex-row">
        <div class="flex-1 basis-4/6">
            <img class="object-cover" src="{{ asset('assets/signup-banner.png') }}" alt="">
        </div>
        <div class="flex-1 basis-2/6 justify-items-center content-center">
            <form action="{{ route('sign_up') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="">
                    <h1 class="montserratExtraBold text-4xl">Sign Up</h1>
                    <p class="text-sm montserratLight">Please sign up to continue.</p>
                </div> --}}

                <div class="w-full max-w-xs">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h1 class="montserratExtraBold text-4xl text-center mb-5">Sign Up</h1>
                        {{-- <p class="text-sm montserratLight mb-5"></p> --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                                Email Address
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm"
                                id="email" type="text" name="email" placeholder="Email address" required
                                autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="password">
                                Password
                            </label>
                            <input
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="password" name="password" type="password" placeholder="******************" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                                Nama Lengkap
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm"
                                id="namaLengkap" type="text" name="namaLengkap" placeholder="Nama Lengkap" required
                                autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                                Tanggal Lahir
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm"
                                id="tangalLahir" type="date" name="tanggalLahir" placeholder="Tanggal Lahir" required
                                autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                                Pas Foto 3x4
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm"
                                id="profilePicture" type="file" name="profilePicture" placeholder="" required
                                autocomplete="off">
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline montserratBold "
                                type="submit">
                                Sign Up
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/">
                            Have an account?
                        </a>
                        </div>
                    </form>
                    <p class="text-center text-gray-500 text-xs">
                        &copy;2024 Peinter Corp. All rights reserved.
                    </p>
                </div>
        </div>
        </form>
    </div>
@endsection
