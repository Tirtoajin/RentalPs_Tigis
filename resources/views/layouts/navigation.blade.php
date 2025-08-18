@if (Auth::check() && Auth::user()->role == 'admin')
    {{-- ============================================= --}}
    {{-- ===== NAVIGASI KHUSUS UNTUK ADMIN (SIDEBAR) ===== --}}
    {{-- ============================================= --}}
    <div x-data="{ open: true }" class="flex flex-col w-64 bg-slate-900 text-gray-100 transition-all duration-300 ease-in-out" :class="{'w-64': open, 'w-20': !open}">
        <div class="flex items-center justify-between h-16 px-4 border-b border-slate-700">
            <span class="font-bold text-lg text-white" :class="{'hidden': !open}">Tigis Rent</span>
            <button @click="open = !open" class="p-2 rounded-md hover:bg-slate-700 focus:outline-none focus:bg-slate-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-md transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-400 hover:bg-slate-700 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="ml-4" :class="{'hidden': !open}">Dashboard</span>
            </a>
            <!-- Manajemen Konsol -->
            <a href="{{ route('admin.consoles.index') }}" class="flex items-center px-4 py-2 rounded-md transition-colors duration-200 {{ request()->routeIs('admin.consoles.*') ? 'bg-indigo-600 text-white' : 'text-gray-400 hover:bg-slate-700 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                <span class="ml-4" :class="{'hidden': !open}">Manajemen Konsol</span>
            </a>
            <!-- Manajemen Booking -->
            <a href="{{ route('admin.bookings.index') }}" class="flex items-center px-4 py-2 rounded-md transition-colors duration-200 {{ request()->routeIs('admin.bookings.*') ? 'bg-indigo-600 text-white' : 'text-gray-400 hover:bg-slate-700 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="ml-4" :class="{'hidden': !open}">Manajemen Booking</span>
            </a>
            <!-- Manajemen Testimoni -->
             <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-2 rounded-md transition-colors duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-600 text-white' : 'text-gray-400 hover:bg-slate-700 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                <span class="ml-4" :class="{'hidden': !open}">Manajemen Testimoni</span>
            </a>
        </nav>
    </div>
@else
    {{-- ================================================= --}}
    {{-- ===== NAVIGASI DEFAULT UNTUK CUSTOMER (NAVBAR ATAS) ===== --}}
    {{-- ================================================= --}}
    <nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md shadow-sm fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl mx-auto rounded-full z-50">
        <!-- Primary Navigation Menu -->
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
                           Tigis Rent
                        </a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Notifikasi & User Dropdown -->
                    <div class="flex items-center space-x-4">
                        @if(Auth::user())
                        <!-- Notifikasi Dropdown -->
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="p-2 rounded-full text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none relative transition-colors duration-200">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                        @if(Auth::user()->unreadNotifications->count())
                                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        @endif
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="block px-4 py-2 text-xs text-gray-400">Notifikasi</div>
                                    @forelse (Auth::user()->unreadNotifications as $notification)
                                        <x-dropdown-link href="{{ $notification->data['url'] }}?read={{ $notification->id }}">
                                            {{ $notification->data['message'] }}
                                        </x-dropdown-link>
                                    @empty
                                         <div class="px-4 py-2 text-sm text-gray-500">Tidak ada notifikasi baru.</div>
                                    @endforelse
                                </x-slot>
                            </x-dropdown>
                        </div>
                        @endif
                        <!-- User Dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="{{ Auth::user()->name }}" />
                                    <div class="ms-2 hidden md:block">{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@endif
