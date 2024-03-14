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
        $my_bookings = Booking::where('user_id', Auth::id())->with('restaurant')->get();
        dd($my_bookings);
        $my_favorites = Favority::where('user_id', Auth::id())->get();
        return view('status', ['my_bookings'=>$my_bookings, 'my_favorites'=>$my_favorites]);
    }
}
