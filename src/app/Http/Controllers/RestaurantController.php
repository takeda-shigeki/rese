<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('index', ['restaurants'=>$restaurants, 'input' => '']);
    }

    public function search(Request $request)
    {
        if(is_null($request->restaurant_area) and is_null($request->genre)){
            $restaurants = Restaurant::all();
            $explanation = '全てのグループ店を表示しています';
        }
        elseif(is_null($request->restaurant_area) and !is_null($request->genre)){
            $restaurants = Restaurant::Where('genre', $request->genre)->get();
            $explanation = "全ての{$request->genre}店を表示しています";
        }
        elseif(!is_null($request->restaurant_area) and is_null($request->genre)){
            $restaurants = Restaurant::Where('prefecture', $request->restaurant_area)->get();
            $explanation = "{$request->restaurant_area}にある全てのグループ店を表示しています";
        }
        else{
            $restaurants = Restaurant::where('prefecture', $request->restaurant_area)->Where('genre', $request->genre)->get();
            if($restaurants->isEmpty()){
                $explanation = "あいにく、{$request->restaurant_area}に当グループの {$request->genre}店はございません";
            }
            else{
                $explanation = "{$request->restaurant_area}にある{$request->genre}店を表示しています";
            }
        }
        return view('index', ['restaurants' => $restaurants, 'explanation' => $explanation]);
    }

    public function keyword_search(Request $request){
        $restaurants = Restaurant::where('name', $request->keyword)->get();
        $input =  $request->keyword;
        return view('index', ['restaurants' => $restaurants, 'input' => $input]);
    }

    public function shop_detail(Request $request){
        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        return view('shop_detail', ['restaurant' => $restaurant,]);
    }

}
