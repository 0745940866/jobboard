<!-- Add Alpine.js for toggle functionality (optional if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav class="bg-black text-white p-4 shadow-md" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <!-- LEFT: LOGO -->
        <div class="flex items-center space-x-2">
            <!-- Hamburger button (mobile only) -->
            <button 
                @click="open = !open" 
                class="sm:hidden focus:outline-none"
            >
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M4 6h16M4 12h16M4 18h16" 
                    />
                </svg>
            </button>

            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="flex flex-col space-y-1">
                    <div class="w-2 h-2 bg-white"></div>
                    <div class="w-2 h-2 bg-white"></div>
                </div>
                <div class="leading-tight">
                    <div class="text-lg font-bold">Pixels</div>
                    <div class="text-xs uppercase tracking-wide">Positions</div>
                </div>
            </div>
        </div>

        <!-- CENTER: PAGE LINKS (Hidden on small screens) -->
        <ul class="hidden sm:flex space-x-6 text-sm">
            <li><a href="/jobs" class="hover:text-gray-400">Jobs</a></li>
            <li><a href="/careers" class="hover:text-gray-400">Careers</a></li>
            <li><a href="/salaries" class="hover:text-gray-400">Salaries</a></li>
            <li><a href="/companies" class="hover:text-gray-400">Companies</a></li>
        </ul>

        <!-- RIGHT: ACTIONS (Hidden on small screens) -->
        <div class="hidden sm:flex space-x-4 text-sm items-center">
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="/post" class="hover:text-green-400">Post a Job</a>
                @endif
                <span class="text-gray-300 hidden sm:inline">Hi, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0; margin: 0; border: none; background: none;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-400">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-400">Register</a>
            @endauth
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open" class="sm:hidden mt-4 space-y-2 text-sm px-4">
        <a href="/jobs" class="block hover:text-gray-400">Jobs</a>
        <a href="/careers" class="block hover:text-gray-400">Careers</a>
        <a href="/salaries" class="block hover:text-gray-400">Salaries</a>
        <a href="/companies" class="block hover:text-gray-400">Companies</a>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="/post" class="block hover:text-green-400">Post a Job</a>
            @endif
            <span class="block text-gray-300">Hi, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block text-left w-full hover:text-red-400">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block hover:text-blue-400">Login</a>
            <a href="{{ route('register') }}" class="block hover:text-blue-400">Register</a>
        @endauth
    </div>
</nav>
