<div wire:poll.10s="loadUnits">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-gray-800">Denah Unit Rental</h3>
        <button wire:click="loadUnits" class="text-sm text-blue-600 hover:underline">Refresh Status</button>
    </div>

    <div class="space-y-6">
        @foreach ($consoles as $console)
            <div>
                <h4 class="font-semibold mb-3 text-lg text-gray-700">{{ $console->name }}</h4>
                <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-4">
                    @for ($i = 1; $i <= $console->stock; $i++)
                        @php
                            $isUnavailable = isset($unavailableUnits[$console->id]) && $i <= $unavailableUnits[$console->id];
                        @endphp
                        
                        <div @class([
                            'p-2 rounded-lg text-center text-white font-bold aspect-square flex flex-col items-center justify-center shadow-md',
                            'bg-red-500' => $isUnavailable,
                            'bg-green-500' => !$isUnavailable,
                        ])>
                            <span class="text-2xl">{{ $i }}</span>
                            <span class="text-xs mt-1">{{ $isUnavailable ? 'Digunakan' : 'Tersedia' }}</span>
                        </div>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 p-4 bg-gray-50 rounded-lg border">
        <h4 class="font-semibold mb-2">Menu Aksi</h4>
        <div class="flex space-x-4">
            <a href="{{ route('customer.booking.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Booking Baru
            </a>
            <a href="{{ route('customer.history') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                Riwayat Transaksi
            </a>
        </div>
    </div>
</div>
