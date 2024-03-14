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
        Date {{ date('Y-m-d', $my_booking->booking_time) }}
        Time {{ date('H:i', $my_booking->booking_time) }}
        Number {{ $my_booking->number }}人
      </div>
      @endforeach
    </div>
    <div class="attendance__button">
      お気に入り店舗
      @foreach ($my_favorites as $my_favorite)
      <div>

      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection