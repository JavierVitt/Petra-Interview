<nav class="bg-white shadow-md py-4 px-6 flex items-center justify-between">
    <div class="text-orange-500 font-bold text-2xl">Peinter Admin Panel</div>
    <ul class="flex items-center space-x-4">
        <li>
            <form action="{{ route('logout.session') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-700 font-medium hover:text-orange-500">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
