<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Favority;

class AuthController extends Controller
{
    public function my_page()
    {
        $restaurants = Restaurant::all();
        $my_favorites = Favority::where('user_id', Auth::id())->get();
        return view('index', ['restaurants'=>$restaurants, 'input' => '', 'my_favorites'=>$my_favorites]);
    }

    
}
