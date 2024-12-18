{{-- <nav class="grid grid-cols-3 text-center shadow-md py-4">
    <img src="{{ asset('storage/logo-navbar.png') }}" alt="err" width="150" class="ml-10">
    <div class="grid grid-cols-3 mt-2 text-violet-900 font-bold">
        <div class=" hover:text-orange-500"><a href="">Add Event</a></div>
        <div class=" hover:text-orange-500"><a href="">Manage Interview</a></div>
    </div>
</nav> --}}



<nav class="bg-gray-300 dark:bg-black">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between bg-gray-300 dark:bg-black">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-black dark:text-white hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" onclick="showMenu()">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="{{ asset('assets/logo-navbar.png') }}" alt="Peinter">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('register_to_event') }}" class="@if(Request::is('register_to_event')) activeNavbarInterviewee @endif montserratSemiBold rounded-md  px-3 py-2 text-sm font-medium text-black dark:text-white hover:opacity-50" aria-current="page">Register to Event</a>
            <a href="{{ route('manage_applications') }}" class="@if(Request::is('manage_applications')) activeNavbarInterviewee @endif montserratSemiBold rounded-md px-3 py-2 text-sm font-medium text-black dark:text-white hover:opacity-50">Manage Aplications</a>
            {{-- <a href="#" class="@if(Request::is('contact_us')) activeNavbar @endif montserratSemiBold rounded-md px-3 py-2 text-sm font-medium text-black dark:text-white hover:opacity-50">Contact Us</a> --}}
            {{-- <a href="#" class="montserratSemiBold rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a> --}}
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

      {{-- <div class="">
          <h1 class="text-black dark:text-white">note: click here to toggle dark/light mode -></h1>
          <button class="flex items-center space-x-1 text-xs" onclick="toggleDarkMode()"
                  class="h-12 w-12 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700">

              <svg class="fill-violet-700 block dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <h1 class="montserratExtraLight block dark:hidden text-violet-700 leading-tight">toggle <br> dark mode</h1>
              
              <svg class="fill-yellow-500 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                  <path
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      fill-rule="evenodd" clip-rule="evenodd"></path>
              </svg>
                 <h1 class="montserratExtraLight hidden dark:block text-yellow-500 leading-tight">toggle <br> light mode</h1>
          
          </button>
       
      </div> --}}

      <div class="flex items-center gap-4">
        <button class="montserratBold text-peinter-yellow bg-white p-3 rounded-2xl" id="interviewerMode" onclick="toggleMode(); window.location.href='{{ route('register_to_event') }}'">Interviewer Mode</button>
        <button class="montserratBold text-peinter-purple bg-white p-3 rounded-2xl" id="intervieweeMode" style="display: none;" onclick="toggleMode(); window.location.href='{{ route('add_event') }}'" >Interviewee Mode</button>
          <form action="{{ route('logout.session') }}" method="POST">
              @csrf
              <button type="submit" class="montserratBold rounded-md px-3 py-2 text-sm text-gray-700 font-medium hover:text-orange-500">
                  Logout
              </button>
          </form>
          <div class="flex items-center gap-2">
            <img 
                src="{{ Auth::user()->profile_picture ?? asset('default-profile.png') }}" 
                alt="Profile Picture" 
                class="w-10 h-10 rounded-full object-cover"
            >
            <span class="montserratBold text-gray-800 font-medium">{{ Auth::user()->name ?? 'Guest' }}</span>
        </div>
      </div>

      <script>
        function toggleMode() {
          const interviewerMode = document.getElementById("interviewerMode");
          const intervieweeMode = document.getElementById("intervieweeMode");

          if (interviewerMode.style.display === "none") {
            interviewerMode.style.display = "block";
            intervieweeMode.style.display = "none";
          } else {
            interviewerMode.style.display = "none";
            intervieweeMode.style.display = "block";
          }
        }

        // Trigger the toggle function on page load or when needed
        window.onload = toggleMode; // Initial state
        // You can also trigger it on a button click or other events as needed
      </script>


        {{-- <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button> --}}

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          {{-- <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="showProfileMenu()">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="{{ asset('storage/ryujin.png') }}" alt="">
            </button>
          </div> --}}

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div id="profileMenu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{ route('register_to_event') }}" class="@if(Request::is('register_to_event')) activeNavbar @endif montserratSemiBold block rounded-md px-3 py-2 text-base font-medium text-black dark:text-white " aria-current="page">Register to Event</a>
      <a href="{{ route('manage_applications') }}" class="@if(Request::is('manage_applications')) activeNavbar @endif montserratSemiBold block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 hover:text-white dark:text-white">Manage Applications</a>
      {{-- <a href="#" class="@if(Request::is('contact_us')) activeNavbar @endif montserratSemiBold block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-gray-700 hover:text-white dark:text-white">Contact Us</a> --}}
    </div>
  </div>
</nav>
