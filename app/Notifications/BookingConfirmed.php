<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking; // <-- Import model Booking

class BookingConfirmed extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Kita akan simpan notifikasi ke database
    }

    // Menyimpan data notifikasi ke database
    public function toDatabase(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'message' => "Booking Anda untuk {$this->booking->console->name} telah dikonfirmasi!",
            'url' => route('customer.history'), // Link saat notif diklik
        ];
    }
}