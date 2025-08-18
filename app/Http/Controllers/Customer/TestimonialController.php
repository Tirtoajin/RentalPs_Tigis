<?php

namespace App\Http\Controllers\Customer;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function create(Booking $booking)
    {
        // =======================================================
        // ===== LOGIKA BARU: REDIRECT JIKA AKSI TIDAK VALID =====
        // =======================================================
        // Cek apakah booking ini milik user yang login dan statusnya sudah selesai
        if ($booking->user_id !== Auth::id() || $booking->status !== 'completed') {
            // Jika tidak valid, kembalikan ke halaman riwayat dengan pesan error
            return redirect()->route('customer.history')->with('error', 'Aksi tidak diizinkan untuk booking ini.');
        }

        // Jika sudah ada ulasan, langsung arahkan kembali ke riwayat
        if ($booking->testimonial) {
            return redirect()->route('customer.history')->with('info', 'Anda sudah memberikan ulasan untuk booking ini.');
        }
        // =======================================================

        return view('customer.testimonials.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        // Keamanan untuk mencegah pengiriman ganda
        if ($booking->user_id !== Auth::id() || $booking->status !== 'completed' || $booking->testimonial) {
            // Jika tidak valid, kembalikan ke halaman riwayat dengan pesan error
            return redirect()->route('customer.history')->with('error', 'Aksi tidak diizinkan atau ulasan sudah ada.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        Testimonial::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'message' => $request->message,
            'rating' => $request->rating,
            'is_approved' => false, // Menunggu persetujuan admin
        ]);

        return redirect()->route('customer.history')->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
