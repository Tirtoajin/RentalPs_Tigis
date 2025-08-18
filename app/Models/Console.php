<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price_per_hour',
        'price_per_day',
        'stock',
        'status',
        'image'
    ];
}
