<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function rating(Request $request){
        $booking_item = Booking::where('id', $request->my_booking_id)->first();
        $restaurant = Restaurant::where('id', $booking_item->restaurant_id)->first();
        $user_id = $booking_item->user_id;
        return view('rating', ['restaurant' => $restaurant,  'user_id' => $user_id]);
    }

    public function rating_store(RatingRequest $request){
        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        $user_id = $request->user_id;
        $score = $request->score;
        $comment = $request->comment;

        $record = [
            'restaurant_id' => $request->restaurant_id,
            'user_id' => $user_id,
            'score' => $score,
            'comment' => $comment,
        ];
        Review::create($record);

        return view('rating', ['restaurant' => $restaurant, 'user_id' => $user_id]);
    }
}
