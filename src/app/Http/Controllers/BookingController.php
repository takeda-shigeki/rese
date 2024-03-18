<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function booking_indication(BookingRequest $request){
        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        $date =$request->date;
        $time =$request->time;
        $number =$request->number;
        if(is_null(Booking::where('restaurant_id', $restaurant->id)->where('user_id', Auth::id())->whereDate('booking_time', $date)->first())) {
            $booking_time = strtotime($date . $time);
            $booking_time = date('Y-m-d H:i', $booking_time);
            $record = [
                'restaurant_id' => $restaurant->id,
                'user_id' => Auth::id(),
                'booking_time' => $booking_time,
                'number' => $number,
            ];
            Booking::create($record);

            $message = "御予約ありがとうございます。以下のとおり予約しました。";

            return view('shop_detail', ['restaurant' => $restaurant, 'date' => $date, 'time' => $time, 'number' => $number."人", 'message' => $message]);
        }
        else {
            $message = "その日の予約を既にされています。予約時間を変更される場合は、マイページで予約取り消しを行った上で、予約し直してください。";

            return view('shop_detail', ['restaurant' => $restaurant, 'message' => $message]);
        }
    }

    public function booking_delete(Request $request)
    {
        Booking::where('id', $request->my_booking_id)->delete();

        return redirect('/my_page/status');
    }
}
