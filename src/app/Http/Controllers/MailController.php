<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Host;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail()
    {
        return view('mail');
    }

    public function send_mail(Request $request)
    {
        $subject = $request->subject;
        $text = $request->text;

        //テスト用
        $name = 'テスト ユーザー';
        $email = 'test@example.com';
        Mail::send('emails.test', ['name' => $name, 'text' => $text], function($message)  use ($email, $subject) {$message->to($email)->subject($subject);});

        //本番用
        //$users = User::all();
        //foreach($users as $user) {
        //    $name = $user->name;
        //    $email = $user->email;
        //    Mail::send('emails.test', ['name' => $name, 'text' => $text], function($message)  use ($email, $subject) {$message->to($email)->subject($subject);});
        //}
        
        $hosts = Host::with('restaurant')->get();
        
        return view('admin', ['hosts' => $hosts]);
    }
}
