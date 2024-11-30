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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Add SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}

    <script>
        function showMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        function showProfileMenu() {
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
    @include('navbar.navbar_interviewer')
    @yield('content')
</body>

</html>
