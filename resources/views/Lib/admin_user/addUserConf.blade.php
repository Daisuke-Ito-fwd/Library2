@extends('layouts.base')

@section('title', 'アカウント追加確認')

{{-- @section('header')
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

    
@endsection --}}

@section('logID', 'xxx@gmail.com')


@section('box1')
    <h2>登録内容の確認</h2>
@endsection
@section('box2')
<div id="addBox">
<form action="addUserFin" method="POST">
    @csrf
    <table id="confUser">
        <tr>
            <th><u>ユーザー種別</u></th>
            <td>
                @if ($reqPost['typ'] == 1)
                <p  name="typ" id="typ">管理</p>
                @elseif($reqPost['typ'] == 2)
                <p  name="typ" id="typ">一般</p>
                @endif
            </td>
        </tr>
        <tr>
            <th><u>氏名</u></th>
            <td>
                    <p type="text" name="name" id="name" >{{ $reqPost['name2'].' '.$reqPost['name1']}}</p>
            </td>
        </tr>
        <tr>
            <th><u>フリガナ</u></th>
            <td>
                <p type="text" name="kana" id="kana" >{{ $reqPost['kana2'].' '.$reqPost['kana1']}}</p>
            </td>
        </tr>
        <tr>
            <th><u>メールアドレス</u></th>
            <td>
                <p type="text" name="mail"  id="mail" >{{ $reqPost['mail'] }}</p>
            </td>
        </tr>
        <tr>
            <th><u>パスワード</u></th>
            <td>
                <p type="password" name="pass" id="pass">{{ $str2 = str_repeat('*', strlen($reqPost['pass'])) }}</p>
            </td>
        </tr>
    </table>
    <div id="box3">
            @foreach ($reqPost as $key => $value)
            <input type="hidden" name={{ $key }} value={{ $value }}>
            @endforeach
            <button type="submit" name="submit" value="user_add" >送信</button>
            <button type="submit" name="submit" value="back"   >編集</button>       
    </div>
</form>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection