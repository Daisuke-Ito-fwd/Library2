@extends('layouts.base')

@section('title', '登録完了')

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
    <h2>書籍登録が完了しました。</h2>
    <p class="finMessage">下記の書籍情報を登録しました。</p>
@endsection
@section('box2')
<div id="addBox">
    <table id="addBook">
            <th><u>タイトル</u></th>
            <td>
                <p>{{ $reqGet->title }}</p>
            </td>
            <th><u>フリガナ</u></th>
            <td>
                <p>{{ $reqGet->kana }}</p>
            </td>
        </tr>
        <tr>
            <th><u>著者</u></th>
            <td>
                <p>{{ $reqGet->auth}}</p>
            </td>
            <th><u>出版日</u></th>
            <td>
                <p>{{ $reqGet->s_date }}</p>
            </td>
        </tr>
        <tr>
            <th><u>出版社</u></th>
            <td>
                <p>{{ $reqGet->publ }}</p>
            </td>
       
            <th><u>ジャンル</u></th>
            <td>
                <p>{{ $reqGet->genre }}</p>
            </td>
        </tr>
        
        <tr>
            <th><u>ISBN</u></th>
            <td>
                <p>{{ $reqGet->isbn }}</p>
            </td>
        
            <th><u>冊数</u></th>
            <td>
                <p>{{ $reqGet->stock }}</p>
            </td>
        </tr>
    </table>
    <form action="insertbook" method="GET">
        @csrf
        @foreach ($reqGet as $key => $value)
        <input type="hidden" name={{ $key }} value={{ $value }}>
        @endforeach
            <div id="box3">
            <button type="button" name="submit" onclick="location.href='addBook'" >続けて登録する</button>    
            <button type="button" name="submit" onclick="location.href='ad'" >管理画面へ戻る</button>    
        </div>
        </form>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection