<div class="w-80 h-screen p-6  py-14 pb-28  justify-center  flex-col flex shadow-2xl bg-white text-purple-800">
    <div class="mb-8">
        <img src="{{ asset('storage/profile_pictures/main.png') }}" alt="Logo" class="w-40 h-w-40 ml-2">
    </div>

    <ul class="space-y-8">
        <li>
            <a href="" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-house-door-fill"></i>
                <span>Home</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li x-data="{ open: false }">
            <a href="#" @click="open = !open" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-book-fill"></i>
                <span>Class</span>
                <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="ml-auto"></i>
            </a>
            <ul x-show="open" @click.away="open = false" x-transition class="pl-4 mt-2 space-y-2">
                <li>
                    <a href="#" class="block text-lg font-medium hover:bg-purple-100 px-4 py-2">Show Classes</a>
                </li>
                <li>
                    <a href="#" class="block text-lg font-medium hover:bg-purple-100 px-4 py-2">Create Class</a>
                </li>
            </ul>
        </li>

        @if(Auth::check() && Auth::user()->hasRole('admin'))
        <li x-data="{ open: false }">
            <a href="#" @click="open = !open" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-bell-fill"></i>
                <span>Requests</span>
                <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="ml-auto"></i>
            </a>
            <ul x-show="open" @click.away="open = false" x-transition class="pl-4 mt-2 space-y-2">
                <li>
                    <a href="/requests" class="block text-lg font-medium hover:bg-purple-100 px-4 py-2">User Approve</a>
                </li>
                <li>
                    <a href="/coach-approve" class="block text-lg font-medium hover:bg-purple-100 px-4 py-2">Coach Approve</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>

    <div class="mt-auto">
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center space-x-3 w-full px-4 py-2 rounded-lg hover:bg-purple-100 text-xl font-semibold">
                <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile) }}" alt="Profile" class="w-10 h-10 rounded-full">
                <span>{{ Auth::user()->name }}</span>
                <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="ml-auto"></i>
            </button>

            <div x-show="open" @click.away="open = false" x-transition class="absolute left-0 w-full mt-2 bg-white shadow-lg rounded-lg text-purple-800 z-10">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-lg font-medium hover:bg-purple-100">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-lg font-medium hover:bg-purple-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
