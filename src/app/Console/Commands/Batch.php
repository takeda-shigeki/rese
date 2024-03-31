<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Mail;

class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約のリマインダー送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // バッチ処理の誤差
        $from = date('Y-m-d H:i:s', strtotime('+1 hours'));
        $to = date('Y-m-d H:i:s', strtotime('+13 hours'));

        // $fromから$toの間のタスクをデータベースから取り出す。
        $bookings = Booking::where('booking_time', '>', $from)->where('booking_time', '<', $to)->get();

        //メール送信をする
        foreach ($bookings as $booking) {
            $name = User::where('id', $booking->user_id)->first()->name;
            $restaurant_name = Restaurant::where('id', $booking->restaurant_id)->first()->name;
            $booking_time = $booking->booking_time;
            $number = $booking->number;
            $email = User::where('id', $booking->user_id)->first()->email;
            $subject = "本日の御予約";

            Mail::send('emails.reminder', ['name' => $name, 'restaurant_name' => $restaurant_name, 'booking_time' => $booking_time, 'number' => $number], function($message)  use ($email, $subject) {$message->to($email)->subject($subject);});
        }
    }
}
