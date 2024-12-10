<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/custom.css'])
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon-header.png') }}">
    {{-- montserrat font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function showMenu(){
            const menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        function showProfileMenu(){
                const profileMenu = document.getElementById('profileMenu');
        if (profileMenu) {
            profileMenu.classList.toggle('hidden');
                }
            }

        // dark mode light mode saving, biar waktu ganti tab tetep.
        function toggleDarkMode() {
            document.body.classList.toggle('dark');
        if (document.body.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
                } else {
            localStorage.setItem('theme', 'light');
                }
            }

        function loadThemePreference() {
                const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            document.body.classList.add('dark');
                } else {
            document.body.classList.remove('dark');
                }
            }

        document.addEventListener('DOMContentLoaded', loadThemePreference);

        document.addEventListener('DOMContentLoaded', function() {
            console.log("DOM loaded");
        });
    </script>
    
</head>
<body>
    @if (!Session::has('email')) 
        @php
            header("Location: " . route('redirect_login'));
            exit();
        @endphp
    @endif

    @include('navbar.navbar_interviewee')
    @yield('content')
</body>
</html>