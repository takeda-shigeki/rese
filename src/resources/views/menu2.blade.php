<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking System</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          ShopList
        </a>
      </div>
    </div>
  </header>
  <main>
        <nav>
          <ul class="header-nav">
            <li class="header-nav__item">
              <a class="header-nav__link" href="/">Home</a>
            </li>            
            <li class="header-nav__item">
              <a class="header-nav__link" href="/attendance">Registration</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="/users">Login</a>
            </li>
            <li class="header-nav__item">
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            </li>
          </ul>
        </nav>
  </main>
</html>