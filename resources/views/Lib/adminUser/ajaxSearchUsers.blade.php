@extends('layouts.base')

@section('title', 'searchUser')
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

@section('box1')
    <h3>ユーザー検索</h3>
    <p class='message'> 
                        登録ユーザーを全て表示する場合は、<u>全て空欄のまま</u>検索ボタンを押してください。
    </p>
@endsection
@section('box2')
    @component('components.searchUser')
    
    @endcomponent
    @component('components.ajaxResultUser')
        
    @endcomponent
@endsection

@section('resultBox')

@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection