@extends('layouts.base')
@section('header')
@component('components.header')
@slot('typ')
@if ($user->typ == 1)
： 管理者
@elseif($user->typ == 0)
：administ
@endif
@endslot
@slot('email')
{{ $user->email }}
@endslot
@endcomponent
@endsection
@section('userBox2')
<div class="container">
    <div class="row" id="endReset">
        <h3 class="col-12">パスワードを更新しました。</h3>

        <p class="col-12">現在ログイン状態です。</p>
        <br>
        <div class="col-12"><button type="button"><a href="/lib/index">トップページ</a></button>
        </div>
        <p class="col-12">終了する場合は右上のログアウトボタンから終了してください。</p>
    </div>
</div>

@endsection
