@extends('layouts.base')

@section('title', 'admin')
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

@section('logID', 'xxx@gmail.com')
@section('box1', '')

@section('box2')
    <table id="adminMenu">
        <tr>
            <td>
                <a href="/lib/addBook"><img src="{{ asset('img/addBook.png') }}" alt="">
                <p class="adTopText">書籍登録<br> </p></a>
            </td>
            <td>
                <a href="/lib/searchBooks"><img src="{{ asset('img/Library.png') }}" alt=""></a>
                <a href="/lib/searchBooks"><p class="adTopText">書籍検索<br>編集・削除</p></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/lib/addUser"><img src="{{ asset('img/addHuman.png') }}" alt=""></a>
                <a href="/lib/addUser"><p class="adTopText">アカウント<br>登録<br> </p></a>
            </td>
            <td>
                <a href="/lib/searchUsers"><img src="{{ asset('img/searchHuman.png') }}" alt=""></a>
                <a href="/lib/searchUsers"><p class="adTopText">アカウント検索<br>編集・削除</p></a>
            </td>
        </tr>
    </table>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection