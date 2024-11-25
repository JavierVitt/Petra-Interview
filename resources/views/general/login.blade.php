@extends('templates/base_general')

@section('title', 'User | Signup')


@section('content')
    <div class="flex flex-row">
        <div class="flex-1 basis-4/6 justify-items-center content-center">
            <img class="object-cover" src="{{ asset('storage/signup-banner.png') }}" alt="">
        </div>

        <div class="flex-1 basis-2/6 justify-items-center content-center">
            {{-- <div class="">
                <h1 class="montserratExtraBold text-4xl">Sign Up</h1>
                <p class="text-sm montserratLight">Please sign up to continue.</p>
            </div> --}}

            <div class="w-full max-w-xs">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h1 class="montserratExtraBold text-4xl text-center mb-5">Login</h1>
                    {{-- <p class="text-sm montserratLight mb-5"></p> --}}
                    <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="username">
                        Email Address
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline montserratRegular text-sm" id="username" type="text" placeholder="Email address">
                    </div>
                    <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 montserratBold" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                    <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    </div>
                    <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline montserratBold " type="button" onclick="window.location.href='{{ route('register_to_event') }}'">
                        Log in
                    </button>
                    {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a> --}}
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2024 Peinter Corp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection