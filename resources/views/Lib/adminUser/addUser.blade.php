@extends('layouts.base')

@section('title', 'アカウント追加')

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


@section('box1')
@isset($edUser)
    <h2>アカウントの編集</h2>
@else
    <h2>アカウントを追加する</h2>
@endisset
@endsection
@section('box2')

    @component('components.addUser')
    @endcomponent
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection