<x-guest-layout>
    <div class="w-full max-w-4xl lg:max-w-5xl bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row overflow-hidden">
        <!-- Kolom Gambar -->
        <div class="w-full md:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('assets/mika-baumeister-o-oqR_WmqJU-unsplash.jpg') }}');">
            <div class="h-full bg-black/50 p-8 flex flex-col justify-end">
                <h1 class="text-white text-4xl font-bold">Tigis Rent</h1>
                <p class="text-gray-300 mt-2">Masuk untuk memulai sesi bermain Anda.</p>
            </div>
        </div>

        <!-- Kolom Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <a href="/" class="text-blue-600 hover:underline mb-6 block">Kembali ke Beranda</a>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
                 <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Daftar di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
