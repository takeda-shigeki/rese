@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="user">
    <p class="user__name">
        <?php $user = Auth::user(); ?>{{ $user->name }}さん専用管理ページ
    </p>
</div>

<div class="admin">
    <div class="admin__host">
        <h3 class="admin__host-title">店舗代表者情報</h3>
        <p></p>
        <table class="admin__host-detail">
            <tr>
                <hd>host_id</hd><hd>氏名</hd><hd>管轄店舗名</hd>
            </tr>
            @foreach ($hosts as $host)
            <tr>
                <td>{{ $host->id }}</td><td><?php $id = $host->user_id; ?>{{ DB::table('users')->find($id)->name }}</td><td><?php $restaurants = $host->restaurant; ?>@foreach ($restaurants as $restaurant){{ $restaurant->name }}{{ "(restaurant_id:".$restaurant->id.")　" }}@endforeach</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div>
        <h3>店舗代表者登録</h3>
        <p></p>
        <form action="/admin/register" method="post">
        @csrf
            <table>
                <tr>
                    <td>代表者のuser_id</td><td><input name="user_id"></td>
                </tr>
                <tr>
                    <td>管轄店舗名</td><td><input name="restaurant_name"></td>
                </tr>
                <tr>
                    <td>店舗のエリア</td><td><select name="restaurant_area"><option value="東京都">東京都</option><option value="大阪府">大阪府</option><option value="福岡県">福岡県</option></select></td>
                </tr>
                <tr>
                    <td>店舗のジャンル</td><td><select name="restaurant_genre"><option  value="寿司">寿司</option><option value="焼肉">焼肉</option><option value="居酒屋">居酒屋</option><option value="イタリアン">イタリアン</option><option value="ラーメン">ラーメン</option></select></td>
                </tr>
            </table>
            <button type="submit">送信する</button>
        </form>
        <p></p>
        <p></p>
        <h3>店舗代表者登録抹消</h3>
        <form action="/admin/delete" method="post">
        @method('DELETE')
        @csrf
            <table>
                <tr>
                    <td>host_id</td><td><input name="host_id"></td>
                </tr>
            </table>
            <button type="submit">登録抹消</button>
        </form>
        <p></p>
        <p></p>
        <h3>店舗登録抹消</h3>
        <form action="/admin/delete" method="post">
        @method('DELETE')
        @csrf
            <table>
                <tr>
                    <td>retaurant_id</td><td><input name="retaurant_id"></td>
                </tr>
            </table>
            <button type="submit">登録抹消</button>
        </form>        
    </div>
</div>
@endsection