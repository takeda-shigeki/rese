<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking System</title>
</head>

<body>
    <main  style="text-align:center">
        <form action="/admin" method="post">
        @csrf
            <h2>お知らせメール作成</h2>
            <a>件名</a><br>
            <input type="text" name="subject"></input><br>
            <p></p>
            <a>本文</a><br>
            <textarea cols="35" rows="15" name="text"></textarea><br>
            <p></p>
            <button type="submit">送信</button>
        </form>
        <p></p>
        <a href="/admin">戻る</a>
    </main>
</body>

</html>