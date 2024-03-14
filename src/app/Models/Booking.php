<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'user_id', 'booking_time', 'number'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
