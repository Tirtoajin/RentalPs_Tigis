<x-app-layout>
    <div class="py-12 mt-24">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('customer.dashboard') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                     Kembali ke Dashboard
                </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    
                    {{-- Tampilkan component Livewire di sini --}}
                    @livewire('booking-map')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>