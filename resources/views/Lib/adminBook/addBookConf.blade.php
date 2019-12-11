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

@section('logID', 'xxx@gmail.com')
@section('box1')
<h2>書籍の追加</h2>
@endsection
@section('box2')
<div id="addBox">
    <table id="addBook">
        <tr>
            <th><u>タイトル</u></th>
            <td colspan="2">
                <p>{{ $reqGet['title'] }}</p>
            </td>
            <th></th>
        </tr>
        <tr>

            <th><u>フリガナ</u></th>
            <td colspan="2">
                <p>{{ $reqGet['kana'] }}</p>
            </td>
            <th></th>
        </tr>
        <tr>
            <th><u>著者</u></th>
            <td>
                <p>{{ $reqGet['auth'] }}</p>
            </td>
            <th class="confBookTh"><u>出版日</u></th>
            <td>
                <p>{{ $reqGet['s_date'] }}</p>
            </td>
        </tr>
        <tr>
            <th><u>出版社</u></th>
            <td>
                <p>{{ $publ->publ }}</p>
            </td>

            <th class="confBookTh"><u>ジャンル</u></th>
            <td>
                <p>{{ $genre->genre }}</p>
            </td>
        </tr>

        <tr>
            <th><u>ISBN</u></th>
            <td>
                <p>{{ $reqGet['isbn'] }}</p>
            </td>

            <th class="confBookTh"><u>冊数</u></th>
            <td>
                <p>{{ $reqGet['stock'] }}</p>
            </td>
        </tr>
    </table>
</div>
    <form action="insertbook" method="GET">
        @csrf
        @foreach ($reqGet as $key => $value)
        <input type="hidden" name={{ $key }} value={{ $value }}>
        @endforeach
        <div id="box3">
            <button type="submit" name="submit" value="go">登録</button>
            <button type="submit" name="submit" value="ng">キャンセル</button>
        </div>
    </form>
    @endsection

    @section('footerL')

    @endsection

    @section('footerR')

    @endsection
