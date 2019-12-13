@extends('layouts.base')

@section('title', 'admin')
@section('header')
    @component('components.header')
        @slot('typ')
            @if ($user->typ  == 1)
            ： 管理者
            @endif
        @endslot
        @slot('email')
        {{ $user->email }}
        @endslot
    @endcomponent
@endsection

@section('box2')

<h3>パスワードを更新しました。</h3>
<p>現在ログイン中です。終了する場合はログアウトボタンを押してください。</p>
    <table id="adminMenu">
        <tr>
            <td>
                <a href="/lib/index">index</a>
            </td>
            <td>
                <a href="/logout">logout</a>
            </td>
        </tr>
       
    </table>
@endsection