@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')
<div class="restaurant">
    <div class="restaurant__detail">
        <h class="restaurant__detail-name">{{ $restaurant['name'] }}</h><br>
        <p></p>
        <img class="restaurant__detail-image" src="/storage/images/{{ $restaurant->id }}.jpg">
        <p class="restaurant__detail-explanation">＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}</p>
        <p class="restaurant__detail-overview">{{ $restaurant['overview'] }}</p>
    </div>

    <div class="restaurant__booking">
        <p></p>
        <h class="restaurant__booking-title">予約変更</h>
        <p></p>
        <form class="restaurant__booking-form" action="/my_page/booking_change" method="post">
        @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" >
            <input type="hidden" name="my_booking_id" value="{{ $my_booking_id }}" >
            <input class="restaurant__booking-form-date" type="date" name="date">
            <p></p>
            <input class="restaurant__booking-form-time" type="time" name="time" min="11:00" max="20:00" step="900" list="data-list">
            <datalist id="data-list">
                <option value="11:00"></option>
                <option value="11:15"></option>
                <option value="11:30"></option>
                <option value="11:45"></option>
                <option value="12:00"></option>
                <option value="12:15"></option>
                <option value="12:30"></option>
                <option value="12:45"></option>
                <option value="13:00"></option>
                <option value="13:15"></option>
                <option value="13:30"></option>
                <option value="13:45"></option>
                <option value="14:00"></option>
                <option value="14:15"></option>
                <option value="14:30"></option>
                <option value="14:45"></option>
                <option value="15:00"></option>
                <option value="15:15"></option>
                <option value="15:30"></option>
                <option value="15:45"></option>
                <option value="16:00"></option>
                <option value="16:15"></option>
                <option value="16:30"></option>
                <option value="16:45"></option>
                <option value="17:00"></option>
                <option value="17:15"></option>
                <option value="17:30"></option>
                <option value="17:45"></option>
                <option value="18:00"></option>
                <option value="18:15"></option>
                <option value="18:30"></option>
                <option value="18:45"></option>
                <option value="19:00"></option>
                <option value="19:15"></option>
                <option value="19:30"></option>
                <option value="19:45"></option>
                <option value="20:00"></option>
            </datalist>
            <p></p>
            <select class="restaurant__booking-form-number" name="number">
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
            </select>
            <p></p>
            <button class="restaurant__booking-form-submit" type="submit">予約変更する</button>
        </form>

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li class="restaurant__booking-error_messsage">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <p></p>
        <p class="restaurant__booking-message">{{ $message ?? '' }}</p>
        <p></p>
        <table class="restaurant__booking-detail">
            <tr>
                <td>Shop:</td><td>{{ $restaurant['name'] }}</td>
            </tr>
            <tr>
                <td>Date:</td><td>{{ $date ?? '' }}</td>
            </tr>
            <tr>
                <td>Time:</td><td>{{ $time ?? '' }}</td>
            </tr>
            <tr>
                <td>Number:</td><td>{{ $number ?? '' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection