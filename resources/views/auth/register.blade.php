<x-guest-layout>
    <div class="w-full max-w-4xl lg:max-w-5xl bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row overflow-hidden">
        <!-- Kolom Gambar -->
        <div class="w-full md:w-1/2 bg-cover bg-center" style="background-image:url('{{ asset('assets/mika-baumeister-o-oqR_WmqJU-unsplash.jpg') }}');">
             <div class="h-full bg-black/50 p-8 flex flex-col justify-end">
                <h1 class="text-white text-4xl font-bold">Tigis Rent</h1>
                <p class="text-gray-300 mt-2">Daftar untuk mendapatkan akses ke semua fitur kami.</p>
            </div>
        </div>

        <!-- Kolom Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <a href="/" class="text-blue-600 hover:underline mb-6 block">Kembali ke Beranda</a>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Buat Akun Baru</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="w-full">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Login di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
