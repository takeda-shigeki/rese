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
      <div class="header-utilities">
        <a class="header__logo">
          Rese
        </a>
        <nav>
          <ul class="header-nav">
            @if (!Auth::check())
            <li class="header-nav__item">
              <a class="header-nav__link" href="/">ホーム<small>(ショップリスト)</small></a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/login">ログイン</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/register">ユーザー登録</a>
            </li>
            @endif
            @if (Auth::check())
              @if (Auth::user()->role!='host')
            <li class="header-nav__item">
              <a class="header-nav__link" href="/my_page">ホーム（ショップリスト）</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/my_page/status">マイページ</a>
            </li>
              @endif
            <li class="header-nav__item">
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

</body>

</html>