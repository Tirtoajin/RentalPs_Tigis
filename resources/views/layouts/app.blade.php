<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Livewire Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        
        @if (Auth::check() && Auth::user()->role == 'admin')
            {{-- ============================================= --}}
            {{-- ===== TAMPILAN KHUSUS UNTUK ADMIN (SIDEBAR) ===== --}}
            {{-- ============================================= --}}
            <div class="flex h-screen bg-gray-200">
                <!-- Sidebar -->
                @include('layouts.navigation')

                <!-- Main content -->
                <div class="flex-1 flex flex-col overflow-hidden">
                    <!-- Top bar -->
                    <header class="flex justify-end items-center p-4 bg-white border-b shadow-sm">
                        <div class="flex items-center space-x-4">
                            <!-- User Dropdown -->
                            <div class="relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
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
                    </header>
                    
                    <!-- Page Content -->
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                        <div class="container mx-auto px-6 py-8">
                            @isset($header)
                                <div class="mb-6">
                                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                        {{ $header }}
                                    </h2>
                                </div>
                            @endisset
                            
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>
        @else
            {{-- ================================================= --}}
            {{-- ===== TAMPILAN DEFAULT UNTUK CUSTOMER (NAVBAR ATAS) ===== --}}
            {{-- ================================================= --}}
            <div class="min-h-screen bg-gray-100">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @endif

        @livewireScripts
    </body>
</html>
