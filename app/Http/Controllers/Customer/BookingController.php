<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Console;  // <-- TAMBAHKAN INI
use App\Models\Booking;  // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Auth; // <-- TAMBAHKAN INI

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $consoles = Console::where('stock', '>', 0)->get();
        return view('customer.booking.create', compact('consoles'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'console_id' => 'required|exists:consoles,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $console = Console::find($request->console_id);

        // Dummy price calculation
        $start = new \DateTime($request->start_time);
        $end = new \DateTime($request->end_time);
        $diff = $end->diff($start);
        $hours = $diff->h + ($diff->days * 24);

        if ($hours <= 0) {
            // Jika waktu sewa kurang dari 1 jam, hitung sebagai 1 jam
            $hours = 1;
        }

        $total_price = $hours * $console->price_per_hour;

        Booking::create([
            'user_id' => Auth::id(), // Ganti menjadi Auth::id()
            'console_id' => $request->console_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.history')->with('success', 'Booking berhasil dibuat! Menunggu konfirmasi admin.');
    }
}