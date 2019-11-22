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
        @slot('mail')
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
@endsection

@section('resultBox')
<hr>
<div id="app">
        <button v-on:click="onClick()" type="button"  id="ajaxUserKey">検索</button>

    <table>

        <tr v-for="item in list" v-bind:key="index">
            <td>@{{ item.volumeInfo.typ }}</td>
            <td>@{{ item.name2 }} @{{ item.name1 }}</td>
            <td>@{{ item.kana2 }} @{{ item.kana1 }}</td>
            <td>@{{ item.mail }}</td>
        </tr>
    </table>
</div>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection