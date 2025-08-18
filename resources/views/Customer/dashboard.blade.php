<x-app-layout>
    <div class="py-12 mt-24">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="mb-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Dashboard') }}
                        </h2>
                    </div>

                    <p class="text-lg mb-2">
                        Selamat Datang, <strong>{{ Auth::user()->name }}</strong>!
                    </p>
                    <p class="text-gray-600 mb-8">
                        Siap untuk bermain? Silakan kelola booking Anda di bawah ini.
                    </p>

                    {{-- MENU AKSI --}}
                    <div class="mt-8 pt-6 border-t">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                            <a href="{{ route('customer.booking.create') }}"
                               class="inline-flex items-center justify-center w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-sm ring-1 ring-black/5 transition-all duration-200 hover:shadow-md hover:translate-y-px">
                                Booking Baru
                            </a>
                            <a href="{{ route('customer.history') }}"
                               class="inline-flex items-center justify-center w-full bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg shadow-sm ring-1 ring-black/5 transition-all duration-200 hover:shadow-md hover:translate-y-px">
                                Riwayat Transaksi
                            </a>
                        </div>
                    </div>

                    {{-- LAYOUT UNIT --}}
                    <div class="space-y-5 mt-6">
                        {{-- Lantai 1 --}}
                        <div class="bg-gray-50 p-6 rounded-lg border">
                            <h3 class="font-bold text-lg mb-4 text-gray-700">Lantai 1</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                {{-- PS3 --}}
                                <div class="h-16 bg-purple-400 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">1</div>
                                <div class="h-16 bg-purple-400 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">2</div>

                                {{-- PS4 --}}
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">1</div>

                                {{-- Operator --}}
                                <div class="h-16 bg-yellow-400 text-gray-900 flex flex-col items-center justify-center rounded-lg font-semibold text-sm text-center shadow-sm ring-1 ring-black/5 md:row-start-1 md:col-start-4">
                                    <span>Operator</span>
                                    <span>Makan &amp; Minum</span>
                                </div>

                                {{-- PS3 --}}
                                <div class="h-16 bg-purple-400 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">3</div>
                                <div class="h-16 bg-purple-400 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">4</div>

                                {{-- PS4 --}}
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">2</div>
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">3</div>
                            </div>
                        </div>

                        {{-- Lantai 2 --}}
                        <div class="bg-gray-50 p-6 rounded-lg border">
                            <h3 class="font-bold text-lg mb-4 text-gray-700">Lantai 2</h3>
                            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                                {{-- PS5 --}}
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">1</div>
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">2</div>
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">3</div>

                                {{-- PS4 --}}
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">4</div>
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">5</div>

                                {{-- PS5 --}}
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">4</div>
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">5</div>
                                <div class="h-16 bg-teal-300 text-gray-900 flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">6</div>

                                {{-- PS4 --}}
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">6</div>
                                <div class="h-16 bg-blue-500 text-white flex items-center justify-center rounded-lg font-semibold text-xl shadow-sm ring-1 ring-black/5 transition hover:shadow-md">7</div>
                            </div>
                        </div>
                    </div>

                    {{-- Keterangan Warna --}}
                    <div class="mt-8 pt-6 border-t">
                        <h4 class="font-semibold mb-3 text-lg">Keterangan Warna Unit</h4>
                        <div class="flex flex-col sm:flex-row gap-y-2 gap-x-6">
                            <div class="flex items-center">
                                <span class="w-5 h-5 rounded-md bg-purple-400 mr-2 border border-gray-300"></span>
                                <span>PlayStation 3</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-5 h-5 rounded-md bg-blue-500 mr-2 border border-gray-300"></span>
                                <span>PlayStation 4</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-5 h-5 rounded-md bg-teal-300 mr-2 border border-gray-300"></span>
                                <span>PlayStation 5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
