@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('content')
<div class="user">
  <p class="user__name">
    <?php $user = Auth::user(); ?>{{ $user->name }}さん
  </p>
</div>

<div class="attendance__content">
  <div class="attendance__panel">
    <div>
      予約状況
      @foreach ($my_bookings as $my_booking)
      <div>
        Shop {{ $my_booking->restaurant->name }}
        Date {{ date('Y-m-d', strtotime($my_booking->booking_time)) }}
        Time {{ date('H:i', strtotime($my_booking->booking_time)) }}
        Number {{ $my_booking->number }}人
        <form class="delete-form" action="/my_page/status" method="post">
          @method('DELETE')
          @csrf
          <div class="delete-form__button">
            <input type="hidden" name="my_booking_id" value="{{ $my_booking['id'] }}">
            <button class="delete-form__button-submit" type="submit">予約取り消し</button>
            {{ $message ?? '' }}
          </div>
        </form>
      </div>
      @endforeach
    </div>
    <div class="attendance__button">
      お気に入り店舗
      @foreach ($my_favorites as $my_favorite)
      <div>
        <img src="/images/{{ $my_favorite->restaurant_id }}.jpg" width=20%>
        {{ $my_favorite->restaurant->name }}
        ＃{{ $my_favorite->restaurant->prefecture }}　＃{{ $my_favorite->restaurant->genre }}
        <form action="/shop_detail" method="get">
          @csrf
          <input type="hidden" value="{{$my_favorite->restaurant->id}}" name="restaurant_id">
          <button class="restaurant__detail-submit" type="submit">詳しく見る</button>
        </form>
        <form action="/my_page/status" method="post">
          @csrf
          <input type="hidden" name="favorite" value="{{$my_favorite->restaurant->id}}">
          <button type="submit">@if($my_favorites->contains('restaurant_id', $my_favorite->restaurant->id)){{ '♥' }}@else{{ '♡' }}@endif</button>
        </form>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection