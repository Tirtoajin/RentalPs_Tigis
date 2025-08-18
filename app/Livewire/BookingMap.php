<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Console;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingMap extends Component
{
    public $consoles;
    public $selectedConsoleId;
    public $selectedUnit;

    public $startTime;
    public $endTime; // <-- KESALAHAN ADA DI SINI, SEHARUSNYA ADA TANDA '$'
    public $unavailableUnits = [];

    // Method ini dijalankan saat component pertama kali dimuat
    public function mount()
    {
        $this->consoles = Console::where('stock', '>', 0)->get();
    }

    // Method ini dijalankan setiap kali ada perubahan
    public function updated()
    {
        $this->checkAvailability();
    }

    public function selectUnit($consoleId, $unitNumber)
    {
        $this->selectedConsoleId = $consoleId;
        $this->selectedUnit = $unitNumber;
    }

    public function checkAvailability()
    {
        $this->unavailableUnits = [];
        if ($this->startTime && $this->endTime) {
            // Cari booking yang bentrok di waktu yang dipilih
            $conflictingBookings = Booking::where('status', '!=', 'cancelled')
                ->where(function ($query) {
                    $query->whereBetween('start_time', [$this->startTime, $this->endTime])
                        ->orWhereBetween('end_time', [$this->startTime, $this->endTime]);
                })
                ->get();

            // Tandai unit yang tidak tersedia
            foreach ($conflictingBookings as $booking) {
                if (!isset($this->unavailableUnits[$booking->console_id])) {
                    $this->unavailableUnits[$booking->console_id] = [];
                }
                if ($booking->unit_number) {
                    $this->unavailableUnits[$booking->console_id][] = $booking->unit_number;
                }
            }
        }
    }

    /**
     * =================================================================
     * METHOD INI YANG DIGANTI DENGAN LOGIKA PEMBAYARAN MIDTRANS
     * =================================================================
     */
    public function processBooking()
    {
        $this->validate([
            'selectedConsoleId' => 'required',
            'selectedUnit' => 'required',
            'startTime' => 'required|date|after:now',
            'endTime' => 'required|date|after:startTime',
        ]);

        $console = Console::find($this->selectedConsoleId);
        $start = new \DateTime($this->startTime);
        $end = new \DateTime($this->endTime);

        $total_seconds = $end->getTimestamp() - $start->getTimestamp();
        $hours = ceil($total_seconds / 3600);

        if ($hours <= 0) {
            $hours = 1;
        }

        $total_price = $hours * $console->price_per_hour;

        // 1. Buat record booking terlebih dahulu dengan status 'unpaid'
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'console_id' => $this->selectedConsoleId,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'total_price' => $total_price,
            'unit_number' => $this->selectedUnit,
            'status' => 'unpaid', // Status awal adalah belum dibayar
        ]);

        // 2. Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // 3. Siapkan detail transaksi untuk dikirim ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'RENTAL-' . $booking->id . '-' . time(), // Order ID unik
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
            ],
        ];

        // 4. Dapatkan URL pembayaran (Snap Token) dari Midtrans
        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

        // 5. Simpan URL pembayaran ke record booking kita
        $booking->payment_url = $paymentUrl;
        $booking->save();

        // 6. Arahkan pengguna ke halaman pembayaran Midtrans
        return redirect()->to($paymentUrl);
    }

    public function render()
    {
        return view('livewire.booking-map');
    }
}
