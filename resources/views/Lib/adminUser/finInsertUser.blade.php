@extends('layouts.base')

@section('title', 'アカウント追加確認')

@section('header')
@component('components.header')
    @slot('typ')
        @if ($user->typ == 1)
        ： 管理者
        @elseif($user->typ == 0)
        ：administ
        @endif
    @endslot
@slot('email')
{{ $user->email }}
@endslot
@endcomponent


@endsection

@section('box1')
<h2>ユーザー登録が完了しました。</h2>
@endsection
@section('box2')
<div id="confUser">
    <p class="finMessage">登録メールアドレスに確認メールを送信しました。</p>
    <p class="finMessage">大切に保管してください。</p>
    <table id="addBookTable">
        <tr>
            <th>ユーザー種別</th>
            <td>
                @if ($abtUser['typ'] == 1)
                管理
                @elseif($abtUser['typ'] == 2)
                一般
                @endif
            </td>
        </tr>
        <tr>
            <th>氏名</th>
            <td>
                {{ $abtUser['name2'].' '.$abtUser['name1']}}
            </td>
        </tr>
        <tr>
            <th>フリガナ</th>
            <td>
                {{ $abtUser['kana2'].' '.$abtUser['kana1']}}
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                {{ $abtUser['email'] }}
            </td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                セキュリティ保護のため表示されません。
            </td>
        </tr>
    </table>
    <div class="container">
        <div class="row">
            <div id="box3" class='col-12'>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 d-flex justify-content-around" id="addBookButton">
                        <input type="button" name="continue" value="続けて登録" onclick="location.href='addUser'">
                        <input type="button" name="toTop" value="管理画面へ戻る" onclick="location.href='index'">
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('footerL')

    @endsection

    @section('footerR')

    @endsection
