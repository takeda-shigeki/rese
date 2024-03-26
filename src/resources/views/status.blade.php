@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/status.css') }}">
@endsection

@section('content')
<div class="user">
    <p class="user__name">
        <?php $user = Auth::user(); ?>{{ $user->name }}さん
    </p>
</div>

<div class="title">
    <p class="title__booking">予約状況</p>
    <p class="title__favorite">お気に入り店舗</p>
</div>

<div class="status">
    <div class="status__booking">
        @foreach ($my_bookings as $my_booking)
        @if ($my_booking->booking_time > date("Y-m-d H:i:s", strtotime($current_time . '-1 month')))
        <div class="status__booking-each">
            <table>
                <tr>
                    <td>Shop:</td><td>{{ $my_booking->restaurant->name }}</td>
                </tr>
                <tr>
                    <td>Date:</td><td>{{ date('Y-m-d', strtotime($my_booking->booking_time)) }}</td>
                </tr>
                <tr>
                    <td>Time:</td><td>{{ date('H:i', strtotime($my_booking->booking_time)) }}</td>
                </tr>
                <tr>
                    <td>Number:</td><td>{{ $my_booking->number }}人</td>
                </tr>
            </table>
            @if ($my_booking->booking_time > $current_time)
            <div class=status__booking-each-change.delete>
                <form action="/my_page/booking_change" method="get">
                @csrf
                    <div class="status__booking-each-change">
                        <input type="hidden" name="my_booking_id" value="{{ $my_booking['id'] }}">
                        <button class="status__booking-each-change-button" type="submit">予約変更</button>
                    </div>
                </form>
                <form action="/my_page/status" method="post">
                @method('DELETE')
                @csrf
                    <div class="status__booking-each-delete">
                        <input type="hidden" name="my_booking_id" value="{{ $my_booking['id'] }}">
                        <button class="status__booking-each-delete-button" type="submit">予約取り消し</button>
                        {{ $message ?? '' }}
                    </div>
                </form>
            </div>
            @else
            <p>ご来店ありがとうございました。ご来店後1ヶ月以内に評価をいただけましたら幸いです。</p>
            <form action="/my_page/rating" method="get">
                @csrf
                <div class="status__booking-each-rating">
                    <input type="hidden" name="my_booking_id" value="{{ $my_booking['id'] }}">
                    <button class="status__booking-each-rating-button" type="submit">評価する</button>
                </div>
            </form>
            @endif
        </div>
        @endif
        @endforeach
    </div>

    <div class="status__favorite">
        @foreach ($my_favorites as $my_favorite)
        <div class="status__favorite-each">
            <img class="restaurant__favorite-each-image" src="/storage/images/{{ $my_favorite->restaurant_id }}.jpg" width=20%>
            <div class="restaurant__favorite-each-explanation">
                <br>
                <h class="restaurant__favorite-each-name">&emsp;{{$my_favorite->restaurant->name }}</h><br>
                <small>&emsp;＃{{ $my_favorite->restaurant->prefecture }}&ensp;＃{{ $my_favorite->restaurant->genre }}</small>
                <div class="restaurant__favorite-each-form">
                    <form action="/shop_detail" method="get">
                    @csrf
                        <input type="hidden" value="{{$my_favorite->restaurant->id}}" name="restaurant_id">
                        <button class="restaurant__favorite-each--detail" type="submit">詳しく見る</button>
                        <p></p>
                    </form>
                    <form action="/my_page/status" method="post">
                    @csrf
                        <input type="hidden" name="favorite" value="{{$my_favorite->restaurant->id}}">
                        <span style="color:#FF00CC">&#x2764;</span>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection