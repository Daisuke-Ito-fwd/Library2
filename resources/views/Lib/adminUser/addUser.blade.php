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
        @slot('mail')
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
@if(isset($edUser) || isset($userInput))
    @component('components.editUser')
        @slot('id')
            {{ $edUser['id'] }}
        @endslot

        @slot('typ')
            {{ $edUser['typ'] }}
        @endslot

        @slot('name2')
            {{ $edUser['name2'] }}
        @endslot

        @slot('name1')
            {{ $edUser['name1'] }}
        @endslot

        @slot('kana2')
            {{ $edUser['kana2'] }}
        @endslot

        @slot('kana1')
            {{ $edUser['kana1'] }}
        @endslot

        @slot('mail')
            {{ $edUser['email'] }}
        @endslot --}}
        @endcomponent
@else
    @component('components.addUser')
    @endcomponent
@endif

@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection