<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking System</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo">
        Rese
      </a>
      <div class="header__utilities">
        <ul class="header__nav">
          @if (!Auth::check())
          <li class="header__nav-item">
            <a class="header__nav-link" href="/">ホーム</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="/login">ログイン</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="/register">ユーザー登録</a>
          </li>
          @endif
          @if (Auth::check())
            @if (Auth::user()->role!='host')
          <li class="header__nav-item">
            <a class="header__nav-link" href="/my_page">ホーム</a>
          </li>
              @if (Auth::user()->role!='admin')
          <li class="header__nav-item">
            <a class="header__nav-link" href="/my_page/status">マイページ</a>
          </li>
              @endif
            @endif
          <li class="header__nav-item">
            <form class="form" action="/logout" method="post">
              @csrf
              <button class="header__nav-button">ログアウト</button>
            </form>
          </li>
            @if (Auth::user()->role=='admin')
          <li class="header__nav-item">
            <a class="header__nav-link" href="/admin/mail">お知らせメール作成</a>
          </li>
            @endif
          @endif
        </ul>
      </div>
  </div>
</header>

<main>
  @yield('content')
</main>

</body>

</html>