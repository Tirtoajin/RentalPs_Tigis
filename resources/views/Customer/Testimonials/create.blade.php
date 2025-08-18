<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Beri Ulasan untuk Booking #{{ $booking->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- ======================================================= --}}
                    {{-- ===== TAMBAHKAN KONDISI @if DI SINI ===== --}}
                    {{-- ======================================================= --}}
                    @if(!$booking->testimonial)
                        <p class="mb-4">Anda sedang memberikan ulasan untuk penyewaan <strong>{{ $booking->console->name }}</strong>.</p>
                        
                        <form method="POST" action="{{ route('customer.testimonials.store', $booking) }}">
                            @csrf

                            <!-- Rating -->
                            <div>
                                <label for="rating" class="block font-medium text-sm text-gray-700">Rating</label>
                                <select id="rating" name="rating" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="5">★★★★★ (Sangat Baik)</option>
                                    <option value="4">★★★★☆ (Baik)</option>
                                    <option value="3">★★★☆☆ (Cukup)</option>
                                    <option value="2">★★☆☆☆ (Buruk)</option>
                                    <option value="1">★☆☆☆☆ (Sangat Buruk)</option>
                                </select>
                                @error('rating')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div class="mt-4">
                                <label for="message" class="block font-medium text-sm text-gray-700">Ulasan Anda</label>
                                <textarea id="message" name="message" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    Kirim Ulasan
                                </button>
                            </div>
                        </form>
                    @else
                        {{-- Tampilkan pesan ini jika ulasan sudah ada --}}
                        <div class="text-center">
                            <p class="text-lg font-medium text-gray-800">Terima kasih!</p>
                            <p class="mt-2 text-gray-600">Anda sudah memberikan ulasan untuk booking ini.</p>
                            <a href="{{ route('customer.history') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                Kembali ke Riwayat Transaksi
                            </a>
                        </div>
                    @endif
                    {{-- ======================================================= --}}
                    {{-- ===== AKHIR DARI PERUBAHAN ===== --}}
                    {{-- ======================================================= --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
