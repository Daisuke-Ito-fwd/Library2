@extends('layouts.base')

@section('title', 'アカウント追加確認')

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
    <h2>ユーザー情報の更新が完了しました。</h2>
@endsection
@section('box2')
<div id="addBox">
    <p class="finMessage">登録メールアドレスに確認メールを送信しました。</p>
    <p class="finMessage">大切に保管してください。</p>
    <table id="confUser">
        <tr>
            <th><u>ユーザー種別</u></th>
            <td>
                @if ($abtUser['typ'] == 1)
                <p  name="typ" id="typ">管理</p>
                @elseif($abtUser['typ'] == 2)
                <p  name="typ" id="typ">一般</p>
                @endif
            </td>
        </tr>
        <tr>
            <th><u>氏名</u></th>
            <td>
                    <p type="text" name="name" id="name" >{{ $abtUser['name2'].' '.$abtUser['name1']}}</p>
            </td>
        </tr>
        <tr>
            <th><u>フリガナ</u></th>
            <td>
                <p type="text" name="kana" id="kana" >{{ $abtUser['kana2'].' '.$abtUser['kana1']}}</p>
            </td>
        </tr>
        <tr>
            <th><u>メールアドレス</u></th>
            <td>
                <p type="text" name="email"  id="email" >{{ $abtUser['email'] }}</p>
            </td>
        </tr>
        <tr>
            <th><u>パスワード</u></th>
            <td>
                <p type="password" name="pass" id="pass">セキュリティ保護のため表示されません。</p>
            </td>
        </tr>
    </table>
    <div id="box3">
            <button  name="continue" value="検索結果一覧へ戻る"  onclick="location.href='{{ $url }}'">検索結果一覧へ戻る</button>
            <button  name="toTop" value="管理画面へ戻る" onclick="location.href='ad'">管理画面へ戻る</button>
    </div>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection