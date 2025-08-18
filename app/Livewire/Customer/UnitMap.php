<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Console;
use App\Models\Booking;

class UnitMap extends Component
{
    public $consoles;
    public $unavailableUnits = [];

    // Method ini dijalankan saat component pertama kali dimuat
    public function mount()
    {
        $this->loadUnits();
    }

    public function loadUnits()
    {
        $this->consoles = Console::all();
        $this->unavailableUnits = [];

        // Cari semua booking yang sedang aktif (confirmed)
        $activeBookings = Booking::where('status', 'confirmed')
            ->where('start_time', '<=', now())
            ->where('end_time', '>', now())
            ->get();

        // Tandai unit yang sedang digunakan
        foreach ($activeBookings as $booking) {
            if (!isset($this->unavailableUnits[$booking->console_id])) {
                $this->unavailableUnits[$booking->console_id] = 0;
            }
            $this->unavailableUnits[$booking->console_id]++;
        }
    }

    public function render()
    {
        return view('livewire.customer.unit-map');
    }
}
