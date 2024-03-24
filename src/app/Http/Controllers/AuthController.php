<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Favority;
use App\Models\Host;
use App\Models\Booking;

class AuthController extends Controller
{
    public function my_page()
    {
        $restaurants = Restaurant::all();
        $my_favorites = Favority::where('user_id', Auth::id())->get();
        return view('index', ['restaurants'=>$restaurants, 'input' => '', 'my_favorites'=>$my_favorites]);
    }

    public function host()
    {
        $host = Host::where('user_id', Auth::id())->first();
        $restaurants = $host->restaurant;
        $bookings = collect();
        foreach ($restaurants as $restaurant) {
            $booking_ids = Booking::where('restaurant_id', $restaurant->id)->select('id')->get();
            foreach ($booking_ids as $booking_id) {
                $booking_item = [];
                $booking_item = Booking::where('id', $booking_id->id)->with('restaurant')->first();
                $bookings->push($booking_item);     
            }
        }

        return view('host', ['restaurants' => $restaurants, 'bookings' => $bookings]);
    }

    public function admin()
    {
        $hosts = Host::with('restaurant')->get();
        
        return view('admin', ['hosts' => $hosts]);
    }    
}
