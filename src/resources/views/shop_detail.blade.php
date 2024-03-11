@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div>
    <div class="restaurant">
        {{ $restaurant['name'] }}
        <img src="/images/{{ $restaurant->id }}.jpg" width=20%>
        ＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}
        {{ $restaurant['overview'] }}
    </div>

    @if (!Auth::check())
    当店に予約される場合はログインをしてください（ユーザー登録がお済みでない方は上のボタンよりお願いします）
    @endif

    @if (Auth::check())
    <form class="booking-form" action="/shop_detail" method="post">
    @csrf
        予約
        <input type="date" name="date" required >
        <input type="time" name="time" min="11:00" max="20:00" step="900" list="data-list" required >
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
        <select class="form-control" name="number">
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
        </select>
    </form>
    @endif
</div>
@endsection