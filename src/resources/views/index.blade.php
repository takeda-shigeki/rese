@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form class="search-form" action="/search" method="get">
  @csrf
  <div class="search-form__item">
    <select class="search-form__item-select" name="restaurant_area">
      <option value="">全てのエリア</option>
      <option value="東京都">東京都</option>
      <option value="大阪府">大阪府</option>
      <option value="福岡県">福岡県</option>
    </select>
  </div>
  <div class="search-form__item">
    <select class="search-form__item-select" name="genre">
      <option value="">全てのジャンル</option>
      <option value="寿司">寿司</option>
      <option value="焼肉">焼肉</option>
      <option value="居酒屋">居酒屋</option>
      <option value="イタリアン">イタリアン</option>
      <option value="ラーメン">ラーメン</option>
    </select>
  </div>
  <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">Search</button>
  </div>
</form>

<form action="/search" method="POST">
@csrf
  店名で検索
  <input type="text" name="keyword" value="{{$input}}">
  <input type="submit">
</form>

<div class="restaurant">
  <h>{{ $explanation ?? '' }}</h>
  <div class="restaurant__row">
    @foreach ($restaurants as $restaurant)
    <div class="restaurant__each">
      <img src="/images/{{ $restaurant->id }}.jpg" width=20%>
      {{ $restaurant['name'] }}
      ＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}
      <form action="/shop_detail" method="get">
        @csrf
        <input type="hidden" value="{{$restaurant->id}}" name="restaurant_id">
        <button class="restaurant__detail-submit" type="submit">詳しく見る</button>
      </form>
      <form action="/checkin" method="post">
        @csrf
        <button class="restaurant__favorite-submit" type="submit">❤</button>
      </form>
    </div>
    @endforeach
  </div>
</div>

@endsection