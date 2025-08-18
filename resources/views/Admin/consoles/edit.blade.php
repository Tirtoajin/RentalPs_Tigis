<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Konsol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.consoles.update', $console->id) }}">
                        @csrf
                        @method('PATCH') {{-- Method untuk update --}}

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Konsol</label>
                            <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="name" value="{{ old('name', $console->name) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" rows="4">{{ old('description', $console->description) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="price_per_hour" class="block font-medium text-sm text-gray-700">Harga per Jam</label>
                            <input id="price_per_hour" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="number" name="price_per_hour" value="{{ old('price_per_hour', $console->price_per_hour) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="price_per_day" class="block font-medium text-sm text-gray-700">Harga per Hari</label>
                            <input id="price_per_day" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="number" name="price_per_day" value="{{ old('price_per_day', $console->price_per_day) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="stock" class="block font-medium text-sm text-gray-700">Stok Unit</label>
                            <input id="stock" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="number" name="stock" value="{{ old('stock', $console->stock) }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Perbarui Konsol
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>