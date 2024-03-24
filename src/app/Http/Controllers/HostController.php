<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Host;
use App\Models\Booking;

class HostController extends Controller
{
    public function overview_update(Request $request){
        Restaurant::where('id', $request->restaurant_id)->update(['overview' => $request->restaurant_overview]);

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
}
