<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id'];

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class)->withTimestamps();
    }
}
