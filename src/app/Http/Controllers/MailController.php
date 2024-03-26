<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail()
    {
        return view('mail');
    }

    public function send_mail(Request $request)
    {
        $name = 'テスト ユーザー';
        $email = 'test@example.com';

        Mail::send('test.mail', [
            'name' => $name,
        ], function ($message) use ($email) {
            $message->to($email)
                ->subject('テストタイトル');
        });

        return view('welcome');
    }
}
