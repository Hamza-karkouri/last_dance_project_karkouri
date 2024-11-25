<div class="w-[370px] h-screen p-6 py-14 pb-28 justify-center flex-col flex shadow-2xl bg-white text-purple-800 fixed top-0 left-0">
    <div class="mb-8">
        <img src="{{ asset('storage/profile_pictures/main.png') }}" alt="Logo" class="w-48 h-w-48 ml-2">
    </div>

    <ul class="space-y-8">
        <li>
            <a href="/home" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
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
                    <a href="classes" class="block text-lg font-medium hover:bg-purple-100 px-4 py-2">Create Class</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="/coach-application" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-person-fill"></i>
                <span>Coach Application</span>
            </a>
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

        <li>
            <a href="/payment" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-credit-card-fill"></i>
                <span>Payment Plan</span>
            </a>
        </li>

        <li>
            <a href="/about" class="flex items-center space-x-3 text-2xl font-bold hover:bg-purple-100 px-4 py-2 rounded-lg transition duration-300">
                <i class="bi bi-info-circle-fill"></i>
                <span>About Us</span>
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center space-x-3 w-full px-4 py-2 rounded-lg hover:bg-purple-100 text-xl font-semibold">
                <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile) }}" alt="Profile" class="w-10 h-10 rounded-full">
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
