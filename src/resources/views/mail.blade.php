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
        <form action="/host" method="post">
        @csrf
            <h2>お知らせメール本文</h2>
            <textarea cols="35" rows="15" name="message"></textarea><br>
            <button type="submit">送信</button>
        </form>
    </main>
</body>

</html>