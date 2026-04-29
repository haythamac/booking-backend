<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'booking_date',
        'notes',
    ];

    protected $casts = [
        'booking_date' => 'datetime',
    ];
}
