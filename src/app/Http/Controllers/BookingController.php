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
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;
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
            $message = "その日の予約を既にされています。予約時間や人数の変更は、マイページより行ってください。";

            return view('shop_detail', ['restaurant' => $restaurant, 'message' => $message]);
        }
    }

    public function booking_delete(Request $request)
    {
        Booking::where('id', $request->my_booking_id)->delete();

        return redirect('/my_page/status');
    }

    public function booking_change(Request $request)
    {
        $booking_item = Booking::where('id', $request->my_booking_id)->first();
        $my_booking_id = $request->my_booking_id;
        $restaurant = Restaurant::where('id', $booking_item->restaurant_id)->first();
        $date = date('Y-m-d', strtotime($booking_item->booking_time));
        $time = date('H:i', strtotime($booking_item->booking_time));
        $number = $booking_item->number;

        return view('booking_change', ['restaurant' => $restaurant, 'date' => $date, 'time' => $time, 'number' => $number, 'my_booking_id' => $my_booking_id, 'message' => '現時点では下記のとおり御予約を承っております']);
    }

    public function booking_renewal(BookingRequest $request){
        Booking::where('id', $request->my_booking_id)->delete();
        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        $my_booking_id = $request->my_booking_id;
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;

        $booking_time = strtotime($date . $time);
        $booking_time = date('Y-m-d H:i', $booking_time);
        $record = [
            'restaurant_id' => $restaurant->id,
            'user_id' => Auth::id(),
            'booking_time' => $booking_time,
            'number' => $number,
        ];
        Booking::create($record);

        $message = "以下のとおりに予約内容を更新しました。";

        return view('booking_change', ['restaurant' => $restaurant, 'date' => $date, 'time' => $time, 'number' => $number."人", 'my_booking_id' => $my_booking_id, 'message' => $message]);

    }

}
