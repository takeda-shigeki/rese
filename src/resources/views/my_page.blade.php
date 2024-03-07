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
    <form class="attendance__button" action="/checkin" method="post">
      @csrf
      <button class="attendance__button-submit" type="submit">詳しく見る</button>
    </form>
    <div class="attendance__button">
      <button class="attendance__button-submit--off">詳しく見る</button>
    </div>
  </div>
</div>

@endsection