@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/rating.css') }}">
@endsection

@section('content')
<div class="restaurant">
    <div class="restaurant__detail">
        <h class="restaurant__detail-name">{{ $restaurant['name'] }}</h><br>
        <p></p>
        <img class="restaurant__detail-image" src="/images/{{ $restaurant->id }}.jpg">
        <p class="restaurant__detail-explanation">＃{{ $restaurant['prefecture'] }}　＃{{ $restaurant['genre'] }}</p>
        <p class="restaurant__detail-overview">{{ $restaurant['overview'] }}</p>
    </div>

    <div class="rating">
        <p></p>
        <h class="rating__title">5段階評価</h>
        <p></p>
        <form class="rating__form" action="/my_page/rating" method="post">
        @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" >
            <input type="hidden" name="user_id" value="{{ $user_id }}" >
            <input type="radio" style="transform:scale(1.4);" class="rating__form-number" name="score" value="1" {{ old ("score") == 1 ? "checked" : "" }}></input>
            <label class="rating__form-label" for="1">1</label>&ensp;
            <input type="radio" style="transform:scale(1.4);" class="rating__form-number" name="score" value="2" {{ old ("score") == 2 ? "checked" : "" }}></input>
            <label class="rating__form-label" for="2">2</label>&ensp;
            <input type="radio" style="transform:scale(1.4);" class="rating__form-number" name="score" value="3" {{ old ("score") == 3 ? "checked" : "" }}></input>
            <label class="rating__form-label" for="3">3</label>&ensp;
            <input type="radio" style="transform:scale(1.4);" class="rating__form-number" name="score" value="4" {{ old ("score") == 4 ? "checked" : "" }}></input>
            <label class="rating__form-label" for="4">4</label>&ensp;
            <input type="radio" style="transform:scale(1.4);" class="rating__form-number" name="score" value="5" {{ old ("score") == 5 ? "checked" : "" }}></input>
            <label class="rating__form-label" for="5">5</label>
            <p></p>
            <p></p>
            <p class="rating__form-instruction">
                よろしければコメントを150文字以内で入力ください
                <textarea  name="comment" cols="25" rows="6"> {{ old ("comment") }}</textarea>
            </p>
            <button class="rating__form-submit" type="submit">送信する</button>
        </form>
        <p class="rating__message">{{ $message ?? '' }}</p>

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li class="rating__error_messsage">{{$error}}</li>
            @endforeach
        </ul>
        @endif

    </div>
</div>
@endsection