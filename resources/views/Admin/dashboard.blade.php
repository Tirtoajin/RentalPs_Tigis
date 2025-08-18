<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Pendapatan -->
        <div class="bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-white bg-opacity-25 p-3 rounded-full flex items-center justify-center h-14 w-14">
                    {{-- ===== UBAH BAGIAN INI ===== --}}
                    <span class="text-xl font-bold text-white-600">Rp</span>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold">Total Pendapatan</p>
                    <p class="text-2xl font-bold">Rp {{ number_format($totalRevenue) }}</p>
                </div>
            </div>
        </div>

        <!-- Booking Hari Ini -->
        <div class="bg-gradient-to-br from-blue-400 to-cyan-500 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-white bg-opacity-25 p-3 rounded-full">
                    <!-- Icon -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold">Booking Hari Ini</p>
                    <p class="text-2xl font-bold">{{ $todayBookings }}</p>
                </div>
            </div>
        </div>

        <!-- Total Konsol -->
        <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-white bg-opacity-25 p-3 rounded-full">
                    <!-- Icon -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold">Total Unit Konsol</p>
                    <p class="text-2xl font-bold">{{ $totalConsoles }}</p>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="bg-gradient-to-br from-yellow-400 to-orange-500 text-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-white bg-opacity-25 p-3 rounded-full">
                    <!-- Icon -->
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold">Total Pelanggan</p>
                    <p class="text-2xl font-bold">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Grafik Pendapatan -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pendapatan 7 Hari Terakhir</h3>
            <canvas id="revenueChart"></canvas>
        </div>

        <!-- Booking Terbaru -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Booking Terbaru</h3>
            <div class="space-y-4">
                @forelse($recentBookings as $booking)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-700">{{ $booking->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $booking->console->name }} - Rp {{ number_format($booking->total_price) }}</p>
                        </div>
                        <span @class([
                            'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                            'bg-orange-100 text-orange-800' => $booking->status == 'unpaid',
                            'bg-yellow-100 text-yellow-800' => $booking->status == 'pending',
                            'bg-green-100 text-green-800' => $booking->status == 'confirmed',
                            'bg-blue-100 text-blue-800' => $booking->status == 'completed',
                        ])>
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada booking terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: @json($chartValues),
                        backgroundColor: 'rgba(79, 70, 229, 0.8)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return 'Rp ' + new Intl.NumberFormat().format(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += 'Rp ' + new Intl.NumberFormat().format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>
