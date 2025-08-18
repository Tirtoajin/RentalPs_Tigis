<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Console;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data statistik.
     */
    public function index()
    {
        // 1. Data untuk Stat Cards
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_price');
        $todayBookings = Booking::whereDate('created_at', today())->count();
        $totalConsoles = Console::sum('stock');
        $totalCustomers = User::where('role', 'customer')->count();

        // 2. Data untuk Grafik Pendapatan 7 Hari Terakhir
        $chartData = Booking::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('sum(total_price) as total')
        )
            ->where('created_at', '>=', now()->subDays(6)) // 7 hari termasuk hari ini
            ->whereIn('status', ['confirmed', 'completed'])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Siapkan label dan nilai untuk Chart.js
        $labels = [];
        $data = [];
        // Inisialisasi 7 hari terakhir dengan pendapatan 0
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->format('d M');
            $data[$date->format('Y-m-d')] = 0;
        }
        // Isi dengan data pendapatan yang ada
        foreach ($chartData as $item) {
            $data[Carbon::parse($item->date)->format('Y-m-d')] = $item->total;
        }

        $chartLabels = array_values($labels);
        $chartValues = array_values($data);

        // 3. Data untuk Tabel Booking Terbaru
        $recentBookings = Booking::with(['user', 'console'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'todayBookings',
            'totalConsoles',
            'totalCustomers',
            'recentBookings',
            'chartLabels',
            'chartValues'
        ));
    }
}
