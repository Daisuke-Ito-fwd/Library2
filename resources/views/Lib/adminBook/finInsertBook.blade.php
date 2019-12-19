@extends('layouts.base')

@section('title', '登録完了')

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

@section('box2')
<h2>書籍登録が完了しました。</h2>
<div id="addBook">
    <table id="addBookTable">
        <tr>
            <th>タイトル：</th>
            <td colspan="2">
                {{ $reqGet->title }}
            </td>
            <td></td>
        </tr>
        <tr>
            <th>フリガナ：</th>
            <td colspan="2">
                {{ $reqGet->kana }}
            </td>
            <td></td>
        </tr>
        <tr>
            <th>著者：</th>
            <td>
                {{ $reqGet->auth }}
            </td>
            <th class="confBookTh">出版日：</th>
            <td>
                {{ $reqGet->s_date }}
            </td>
        </tr>
        <tr>
            <th>出版社：</th>
            <td>
                {{ $reqGet->publ }}
            </td>

            <th class="confBookTh">ジャンル：</th>
            <td>
                {{ $reqGet->genre }}
            </td>
        </tr>

        <tr>
            <th>ISBN：</th>
            <td>
                {{ $reqGet->isbn }}
            </td>

            <th class="confBookTh">冊数：</th>
            <td>
                {{ $reqGet->stock }}
            </td>
        </tr>
    </table>
</div>

<div class="container">
    <div class="row">
        <div id="box3" class='col-12'>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 d-flex justify-content-around" id="addBookButton">
                    <div>
                        <button type="button" name="submit" onclick="location.href='addBook'">続けて登録する</button>
                    </div>
                    <div>
                        <button type="button" name="submit" onclick="location.href='index'">管理画面へ戻る</button>
                    </div>
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
