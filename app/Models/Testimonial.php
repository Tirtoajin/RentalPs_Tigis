<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Cukup satu baris ini saja
    protected $fillable = [
        'user_id',
        'booking_id', // Pastikan ini ada
        'message',
        'rating',
        'is_approved'
    ];

    /**
     * Get the user that owns the testimonial.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the booking that owns the testimonial.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}