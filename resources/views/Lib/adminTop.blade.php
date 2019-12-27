@extends('layouts.base')

@section('title', 'admin')
@section('header')
@component('components.header')
@slot('typ')
@if ($user->typ == 1)
： 管理者
@endif
@endslot
@slot('email')
{{ $user->email }}
@endslot
@endcomponent
@endsection

@section('logID')
@section('box1')

@section('box2')
<div class="container">

    <div class="row mx-auto" id="adminMenu">
        <div class="col-sm-5 mx-auto">
            <a href="/lib/addBook"><img src="{{ asset('img/addBook.png') }}" alt="">
                <p class="adTopText">書籍登録<br> </p>
            </a>
        </div>
        <div class="col-sm-5 mx-auto">
            <a href="/lib/searchBooks"><img src="{{ asset('img/Library.png') }}" alt=""></a>
            <a href="/lib/searchBooks">
                <p class="adTopText">書籍検索<br>編集・削除</p>
            </a>
        </div>
        <div class="col-sm-5 mx-auto">
            <a href="/lib/addUser"><img src="{{ asset('img/addHuman.png') }}" alt=""></a>
            <a href="/lib/addUser">
                <p class="adTopText">アカウント<br>登録<br> </p>
            </a>
        </div>
        <div class="col-sm-5 mx-auto">
            <a href="/lib/searchUsers"><img src="{{ asset('img/searchHuman.png') }}" alt=""></a>
            <a href="/lib/searchUsers">
                <p class="adTopText">アカウント検索<br>編集・削除</p>
            </a>
        </div>
        <div class="col-12 mx-auto">
            <a href="#" v-on:click="popGraph()">
                <h2 class="adTopText" target="newtab">グラフを表示する</h2>
            </a>
        </div>
    </div>
</div>
@endsection

@section('footerL')

@endsection

@section('footerR')

@endsection
