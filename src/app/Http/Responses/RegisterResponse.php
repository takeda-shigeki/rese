<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Http\JsonResponse;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();
        return $request->wantsJson()
                    ? new JsonResponse($user, 201) //登録後user情報とレスポンスステータスCreatedを渡す
                    : redirect('/thanks');
    }
}

