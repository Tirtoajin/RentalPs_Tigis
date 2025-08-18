<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard customer.
     */
    public function index()
    {
        return view('customer.dashboard');
    }

    /**
     * Menampilkan halaman riwayat transaksi customer.
     */
    public function history(Request $request)
    {
        // 2. Tambahkan blok kode ini untuk mengecek notifikasi
        if ($request->has('read')) {
            $notification = Auth::user()->notifications()->where('id', $request->read)->first();
            if ($notification) {
                $notification->markAsRead();
            }
        }

        // Kode yang sudah ada sebelumnya
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('customer.history', compact('bookings'));
    }
    // ===== AKHIR DARI EDIT =====
}