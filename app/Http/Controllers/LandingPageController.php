<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Console;
use App\Models\Testimonial;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index()
    {
        $consoles = Console::where('status', 'available')->where('stock', '>', 0)->get();
        $testimonials = Testimonial::where('is_approved', true)->latest()->take(5)->get();

        // --- LOGIKA BARU UNTUK STATUS REAL-TIME ---
        $activeBookings = Booking::where('status', 'confirmed')
            ->where('start_time', '<=', now())
            ->where('end_time', '>', now())
            ->get();

        // =======================================================
        // ===== BAGIAN YANG DIPERBAIKI ADA DI SINI =====
        // =======================================================
        // Membuat peta unit yang sedang dibooking dengan format:
        // [console_id => [unit_number => end_time]]
        $bookedUnitsMap = [];
        foreach ($activeBookings as $booking) {
            if ($booking->unit_number) { // Pastikan unit_number tidak null
                $bookedUnitsMap[$booking->console_id][$booking->unit_number] = $booking->end_time;
            }
        }
        // =======================================================

        return view('landing', compact('consoles', 'testimonials', 'bookedUnitsMap'));
    }
}
