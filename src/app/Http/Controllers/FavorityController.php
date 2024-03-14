<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favority;
use Illuminate\Support\Facades\Auth;

class FavorityController extends Controller
{
    public function favority(Request $request){
        $favorite = Restaurant::where('id', $request->favorite)->first();

        if(!Favority::where('restaurant_id', $favorite->id)->where('user_id', Auth::id())->exists()) {
            $record = [
                'restaurant_id' => $favorite->id,
                'user_id' => Auth::id(),
            ];
            Favority::create($record);
        }
        else{
            Favority::where('restaurant_id', $favorite->id)->where('user_id', Auth::id())->delete();
        }
        $my_favorites = Favority::where('user_id', Auth::id())->get();

        $restaurants = Restaurant::all();

        return view('index', ['restaurants'=>$restaurants, 'my_favorites'=>$my_favorites, 'input' => '']);
    }
}
