<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'user_id',
        'console_id',
        'start_time',
        'end_time',
        'total_price',
        'status',
        'unit_number',
        'payment_url',
    ];

    // Relasi ke User dan Console
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function console()
    {
        return $this->belongsTo(Console::class);
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}
