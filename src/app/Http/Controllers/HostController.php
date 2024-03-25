<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Host;
use App\Models\Booking;
use App\Models\User;

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

    public function host_registration(Request $request){
        $host_record = [
            'user_id' => $request->user_id,
        ];
        Host::create($host_record);

        $user = User::where('id', $request->user_id)->first();
        $user->role = 'host';
        $user->save();

        $restaurant_record = [
            'name' => $request->restaurant_name,
            'prefecture' => $request->restaurant_area,
            'genre' => $request->restaurant_genre,
            'overview' => '(店舗代表者にて記入ください)',
        ];

        Restaurant::create($restaurant_record);
        $host = Host::where('user_id', $request->user_id)->first();
        $restaurant_id = Restaurant::where('name', $request->restaurant_name)->first()->id;
        $host->restaurant()->sync($restaurant_id);

        $hosts = Host::with('restaurant')->get();
        
        return view('admin', ['hosts' => $hosts]);
    }

    public function delete(Request $request){
        Restaurant::where('id', $request->retaurant_id)->delete();
        Host::where('id', $request->host_id)->delete();

        return redirect('/admin');
    }

    public function image_upload(Request $request) {
        $request->validate([
            'upload_image' => 'required|max:1024'
        ]);

        $request->upload_image->store('upimages');

        echo "upload success";
        exit;
    }
}
