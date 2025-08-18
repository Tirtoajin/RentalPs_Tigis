<x-admin-layout>
    <x-slot name="header">
        {{ __('Manajemen Booking') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Konsol</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Mulai</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Selesai</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $booking->console->name }} #{{$booking->unit_number}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($booking->start_time)->format('d M, H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($booking->end_time)->format('d M, H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span @class([
                                                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                'bg-orange-100 text-orange-800' => $booking->status == 'unpaid',
                                                'bg-yellow-100 text-yellow-800' => $booking->status == 'pending',
                                                'bg-green-100 text-green-800' => $booking->status == 'confirmed',
                                                'bg-red-100 text-red-800' => $booking->status == 'cancelled',
                                                'bg-blue-100 text-blue-800' => $booking->status == 'completed',
                                            ])>
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if ($booking->status == 'pending' || $booking->status == 'unpaid')
                                                <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Konfirmasi</button>
                                                </form>
                                                <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST" class="inline ml-4">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Batalkan</button>
                                                </form>
                                            @elseif ($booking->status == 'confirmed')
                                                <form action="{{ route('admin.bookings.complete', $booking) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-blue-600 hover:text-blue-900">Selesaikan</button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center">Tidak ada data booking.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
