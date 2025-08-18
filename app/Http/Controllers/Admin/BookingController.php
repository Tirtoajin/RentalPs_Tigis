<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\BookingConfirmed; // Akan kita buat di langkah berikutnya
use App\Notifications\BookingCancelled; // Opsional, jika Anda ingin notif pembatalan

class BookingController extends Controller
{
    // Menampilkan daftar semua booking
    public function index()
    {
        // Gunakan `with` untuk Eager Loading, menghindari N+1 query problem
        $bookings = Booking::with(['user', 'console'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Mengonfirmasi booking
    public function confirm(Booking $booking)
    {
        $booking->status = 'confirmed';
        $booking->save();

        // Kirim notifikasi ke user (Langkah 8)
        $booking->user->notify(new BookingConfirmed($booking));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dikonfirmasi.');
    }

    // Membatalkan booking
    public function cancel(Booking $booking)
    {
        $booking->status = 'cancelled';
        $booking->save();

        // Opsional: Kirim notifikasi pembatalan
        // $booking->user->notify(new BookingCancelled($booking));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dibatalkan.');
    }

    //status complete bookings
    public function complete(Booking $booking)
    {
        $booking->status = 'completed';
        $booking->save();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking ditandai sebagai selesai.');
    }
}