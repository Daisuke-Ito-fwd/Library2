@extends('layouts.base')
@section('header')
    @component('components.header')
        @slot('typ')
            @if ($user->typ  == 1)
            ： 管理者
            @elseif($user->typ  == 0)
            ：administ
            @endif
        @endslot
        @slot('email')
          {{ $user->email }}
        @endslot
        @endcomponent
@endsection
@section('userBox2')
<h3>パスワードを更新しました。</h3>

<p>現在ログイン状態です。</p>
<br>
<button type="button"><a href="/lib/index">トップページ</a></button>
<p>終了する場合は右上のログアウトボタンから終了してください。</p>

@endsection
