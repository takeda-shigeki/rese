@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
  <p class="thanks__expression">会員登録ありがとうございます</p>
  <div class="login__link">
    <a class="tlogin__button-submit" href="/login">ログイン</a>
  </div>
</div>
@endsection