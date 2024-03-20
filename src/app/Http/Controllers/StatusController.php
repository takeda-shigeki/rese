<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favority;
use App\Models\Booking;
use App\Models\Restaurant;

class StatusController extends Controller
{
    public function status(){
        $my_bookings = Booking::where('user_id', Auth::id())->with('restaurant')->get()->sortBy('booking_time');
        $my_favorites = Favority::where('user_id', Auth::id())->with('restaurant')->get();
        $current_time = date("Y-m-d H:i:s");
        return view('status', ['my_bookings'=>$my_bookings, 'my_favorites'=>$my_favorites, 'current_time'=>$current_time]);
    }
}
