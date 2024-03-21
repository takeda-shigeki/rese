<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'user_id', 'score', 'comment'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
