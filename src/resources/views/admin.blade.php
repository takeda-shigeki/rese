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
        <h class="admin__host-title">店舗代表者情報</h>
        <p></p>
        <table class="admin__host-detail">
            <tr>
                <hd>host_id</hd><hd>氏名</hd><hd>管轄店舗</hd>
            </tr>
            @foreach ($hosts as $host)
            <tr>
                <td>{{ $host->id }}</td><td><?php $id = $host->user_id; ?>{{ DB::table('users')->find($id)->name }}</td><td><?php $restaurants = $host->restaurant; ?>@foreach ($restaurants as $restaurant){{ $restaurant->name }}@endforeach</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection