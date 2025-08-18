<div>
    {{-- Form untuk memilih waktu --}}
    <div class="p-4 mb-6 bg-gray-100 rounded-lg">
        <h3 class="font-bold text-lg mb-2">1. Pilih Waktu Sewa</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                <input type="datetime-local" id="start_time" wire:model.live="startTime" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                <input type="datetime-local" id="end_time" wire:model.live="endTime" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>
        @error('startTime') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        @error('endTime') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Peta Visual Unit PS --}}
    @if($startTime && $endTime)
    <div class="p-4 bg-gray-100 rounded-lg">
        <h3 class="font-bold text-lg mb-4">2. Pilih Unit PlayStation yang Tersedia</h3>
        @foreach ($consoles as $console)
            <div class="mb-6">
                <h4 class="font-semibold mb-2">{{ $console->name }}</h4>
                <div class="grid grid-cols-5 sm:grid-cols-8 md:grid-cols-10 gap-2">
                    @for ($i = 1; $i <= $console->stock; $i++)
                        {{-- ======================================================= --}}
                        {{-- ===== BAGIAN YANG DIPERBAIKI ADA DI SINI ===== --}}
                        {{-- ======================================================= --}}
                        @php
                            $isUnavailable = in_array($i, $unavailableUnits[$console->id] ?? []);
                            $isSelected = $selectedConsoleId == $console->id && $selectedUnit == $i;
                        @endphp
                        
                        <button 
                            wire:click="selectUnit({{ $console->id }}, {{ $i }})"
                            @disabled($isUnavailable)
                            @class([
                                'p-2 rounded text-center text-white font-bold aspect-square flex items-center justify-center',
                                'bg-gray-400 cursor-not-allowed' => $isUnavailable,
                                'bg-green-500 hover:bg-green-600' => !$isUnavailable && !$isSelected,
                                'bg-blue-600 ring-2 ring-offset-2 ring-blue-500' => $isSelected,
                            ])
                        >
                            {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="p-4 text-center bg-gray-100 rounded-lg">
        <p>Silakan pilih waktu mulai dan selesai untuk melihat ketersediaan unit.</p>
    </div>
    @endif

    {{-- Tombol Proses Booking --}}
    @if($selectedUnit)
    <div class="mt-6 text-center">
        <button wire:click="processBooking" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg text-lg">
            Booking Unit #{{$selectedUnit}} Sekarang!
        </button>
    </div>
    @endif
</div>
