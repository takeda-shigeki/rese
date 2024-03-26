@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/host.css') }}">
@endsection

@section('content')
<div class="user">
    <p class="user__name">
        <?php $user = Auth::user(); ?>{{ $user->name }}さんが代表を務める店舗の情報です
    </p>
</div>

<div class="restaurant">
    @foreach ($restaurants as $restaurant)
    <div class="restaurant__detail">
        <h class="restaurant__detail-name">{{ $restaurant['name'] }}</h><br>
        <p></p>
        <img class="restaurant__detail-image" src="/storage/images/{{ $restaurant->id }}.jpg">
        <p class="restaurant__detail-explanation">＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}</p>
        <p class="restaurant__detail-overview">{{ $restaurant['overview'] }}</p>
        <p></p>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="/host/image_upload" enctype="multipart/form-data">
        @csrf
            画像の登録は以下より行ってください
            <div>
                <div>
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                    <input type="file" name="image">
                </div>
                <button type="submit" >送信</button>
            </div>
        </form>
        <p></p>
        <form action="/host" method="post">
        @csrf
            店舗紹介文の更新は以下より行ってください（最大125文字）
            <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
            <textarea cols="25" rows="5" name="restaurant_overview"></textarea><br>
            <button class="restaurant__detail-submit" type="submit">送信</button>
        </form>
    </div>   
    @endforeach

    <div class="restaurant__booking">
        <h class="restaurant__booking-title">予約情報</h>
        <p></p>
        @foreach ($bookings as $booking)
        <table class="restaurant__booking-detail">
            <tr>
                <td>レストラン名:</td><td>{{ $booking->restaurant->name ?? ''  }}</td>
            </tr>
            <tr>
                <td>予約日時:</td><td>{{ $booking['booking_time']  ?? '' }}</td>
            </tr>
            <tr>
                <td>人数:</td><td>{{ $booking['number'] ?? '' }}</td>
            </tr>
        </table>
        <p></p>
        @endforeach
    </div>
</div>
@endsection