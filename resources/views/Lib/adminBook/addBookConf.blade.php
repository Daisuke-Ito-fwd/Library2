@extends('layouts.base')

@section('title', '書籍追加')

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

<h2>書籍の追加</h2>
<div id="addBook">
    <table id="addBookTable">
        <tr>
            <th>タイトル：</th>
            <td colspan="2">
                {{ $reqGet['title'] }}
            </td>
            <td></td>
        </tr>
        <tr>
            <th>フリガナ：</th>
            <td colspan="2">
                {{ $reqGet['kana'] }}
            </td>
            <td></td>
        </tr>
        <tr>
            <th>著者：</th>
            <td>
                {{ $reqGet['auth'] }}
            </td>
            <th class="confBookTh">出版日：</th>
            <td>
                {{ $reqGet['s_date'] }}
            </td>
        </tr>
        <tr>
            <th>出版社：</th>
            <td>
                {{ $publ->publ }}
            </td>

            <th class="confBookTh">ジャンル：</th>
            <td>
                {{ $genre->genre }}
            </td>
        </tr>

        <tr>
            <th>ISBN：</th>
            <td>
                {{ $reqGet['isbn'] }}
            </td>

            <th class="confBookTh">冊数：</th>
            <td>
                {{ $reqGet['stock'] }}
            </td>
        </tr>
    </table>
</div>
<form action="insertbook" method="GET">
    @csrf
    @foreach ($reqGet as $key => $value)
    <input type="hidden" name={{ $key }} value={{ $value }}>
    @endforeach
    <div class="container">
        <div class="row">
            <div id="box3" class='col-12'>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 d-flex justify-content-around" id="addBookButton">
                        <div class="row" id="finButton">

                            <div class="col-5">
                                <button type="submit" name="submit" value="go">登録</button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <button type="submit" name="submit" value="ng">編集</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('footerL')

@endsection

@section('footerR')

@endsection
