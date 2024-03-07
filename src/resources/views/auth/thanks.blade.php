@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__content">
  <div class="register__link">
    <p class="register__link-instruction">会員登録ありがとうございます</p>
    <a class="register__button-submit" href="/login">ログイン</a>
  </div>
</div>
@endsection