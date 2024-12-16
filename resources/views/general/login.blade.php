@extends('templates/base_general')

@section('title', 'User | Login')

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
    @if (session('success'))
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

    <!-- Full-screen container for centering content -->
    <div class="flex flex-col lg:flex-row justify-center items-center min-h-screen py-6 space-y-8 lg:space-y-0 lg:space-x-8">
        <!-- Left Section: Image -->
        <div class="flex-1 w-full max-w-md">
            <img class="object-cover w-full h-full rounded-lg shadow-lg" src="{{ asset('assets/signup-banner.png') }}"
                alt="">
        </div>

        <!-- Right Section: Form -->
        <div class="flex-1 w-full max-w-md">
            <form action="{{ route('login') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-6">
                @csrf
                <h1 class="montserratExtraBold text-4xl text-center mb-5">Login</h1>

                <!-- Email Input -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                        Email Address
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm"
                        id="username" type="text" placeholder="Email address" required name="email"
                        autocomplete="off">
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="******************" required name="password">
                    <p class="text-red-500 text-xs italic">Please choose a password.</p>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline montserratBold"
                        type="submit">
                        Log in
                    </button>
                </div>

                <!-- First-time User Link -->
                <div class="flex items-center justify-center pt-2">
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                        href="/sign_up">
                        First Timer?
                    </a>
                </div>

                <p class="text-center text-gray-500 text-xs mt-4">
                    &copy;2024 Peinter Corp. All rights reserved.
                </p>
            </form>
        </div>
    </div>
@endsection
