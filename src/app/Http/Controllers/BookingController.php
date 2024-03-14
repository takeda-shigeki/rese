<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking_indication(Request $request){
        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        $date =$request->date;
        $time =$request->time;
        $number =$request->number;

        $booking_time = strtotime($date . $time);
        $booking_time = date('Y-m-d H:i', $booking_time);
        $record = [
            'restaurant_id' => $restaurant->id,
            'user_id' => Auth::id(),
            'booking_time' => $booking_time,
            'number' => $number,
        ];
        Booking::create($record);

        $message = "御予約ありがとうございます";

        return view('shop_detail', ['restaurant' => $restaurant, 'date' => $date, 'time' => $time, 'number' => $number, 'message' => $message]);
    }
}
