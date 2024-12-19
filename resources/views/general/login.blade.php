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

    <!-- Container for Login Page -->
    <div class="flex flex-col lg:flex-row mx-4 min-h-screen items-center justify-center bg-gray-100">
        <!-- Left Section: Image -->
        <div class="w-full lg:w-3/5 flex justify-center py-4 items-center mb-8 lg:mb-0 px-4">
            <img class="w-full h-auto lg:h-screen object-cover rounded-lg shadow-lg"
                src="{{ asset('assets/signup-banner.png') }}" alt="Sign Up Banner">
        </div>

        <!-- Right Section: Form -->
        <div class="w-full lg:w-2/5 mx-4 px-6 sm:px-12 lg:px-16 py-8 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-center text-gray-800 mb-6">Login</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email Address
                    </label>
                    <input
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        id="email" type="email" placeholder="&#64;john.petra.ac.id" name="email" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        id="password" type="password" placeholder="******************" name="password" required>
                </div>
                <div class="flex justify-center mb-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition w-full lg:w-auto">
                        Log in
                    </button>
                </div>
                <div class="text-center">
                    <a href="{{ route('sign_up_page') }}" class="text-blue-500 hover:underline font-semibold text-sm">
                        First Timer? Sign Up Here
                    </a>
                </div>
            </form>
            <p class="text-center text-gray-400 text-xs mt-6">
                &copy;2024 Peinter Corp. All rights reserved.
            </p>
        </div>
    </div>
@endsection
