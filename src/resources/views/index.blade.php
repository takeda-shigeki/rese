@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form class="search__form" action="/search" method="get">
  @csrf
  <div class="search__form-item">
    <select class="search__form-item-select" name="restaurant_area">
      <option value="">全てのエリア</option>
      <option value="東京都">東京都</option>
      <option value="大阪府">大阪府</option>
      <option value="福岡県">福岡県</option>
    </select>
  </div>
  <div class="search__form-item">
    <select class="search__form-item-select" name="genre">
      <option value="">全てのジャンル</option>
      <option value="寿司">寿司</option>
      <option value="焼肉">焼肉</option>
      <option value="居酒屋">居酒屋</option>
      <option value="イタリアン">イタリアン</option>
      <option value="ラーメン">ラーメン</option>
    </select>
  </div>
  <div class="search__form-button">
      <button class="search__form-button-submit" type="submit">検索</button>
  </div>
</form>

<form class="search__form" action="/search" method="POST">
@csrf
  店名で検索
  <input type="text" name="keyword" value="{{$input ?? ''}}">
  <input type="submit">
</form>

<p></p>
<p class="search__explanation">{{ $explanation ?? '' }}</p>
<p></p>

<div class="restaurant__list">
  @foreach ($restaurants as $restaurant)
  <div class="restaurant__list-each">
    <img class="restaurant__list-each-image" src="/storage/images/{{ $restaurant->id }}.jpg">
    <div class="restaurant__list-each-explanation">
      <h class="restaurant__list-each-name">{{ $restaurant['name'] }}</h><br>
      <small>＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}</small>
      <div class="restaurant__list-each-form">
        <form action="/shop_detail" method="get">
          @csrf
          <input type="hidden" value="{{$restaurant->id}}" name="restaurant_id">
          <button class="restaurant__detail-submit" type="submit">詳しく見る</button>
        </form>
        @if (Auth::check())
        <form action="/my_page" method="post">
          @csrf
          <input type="hidden" name="favorite" value="{{$restaurant->id}}">
          <button class="restaurant__favorite-submit" type="submit">@if($my_favorites->contains('restaurant_id', $restaurant->id))<span style="color:#FF00CC">&#x2764;</span>@else&#x1f90d;@endif</button>
        </form>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection