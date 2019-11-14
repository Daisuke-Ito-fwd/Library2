@extends('layouts.base')

@section('title', '書籍追加')

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
    <h2>書籍の追加</h2>
@endsection
@section('box2')
<div id="addBox">
<form action="" method="GET">
    @csrf
    <table id="addBook">
        <tr>
            <th><u>タイトル</u></th>
            <td>
                <input type="text" id="title" name="title">
            </td>
            <th><u>フリガナ</u></th>
            <td>
                <input type="text"  id="kana" name="kana">
                <p class="etc">※全角のみ</p>
            </td>
        </tr>
        <tr>
            <th><u>著者</u></th>
                <td>
                    <input type="text" id="auth" name="auth">
                </td>
            <th><u>出版日</u></th>
                <td>
                    <input type="date"  id="s_date" name="s_date">
                </td>
        </tr>
        <tr>
            <th><u>出版社</u></th>
            <td>
                <select name="publ" id="publ">
                    {{-- fromDB foreach --}}
                    <option value="dummy"></option>
                </select>
            </td>
       
            <th><u>ジャンル</u></th>
            <td>
                <select name="genre" id="genre">
                    {{-- fromDB foreach --}}
                    <option value="dummy"></option>
                </select>
            </td>
        </tr>
        
        <tr>
            <th><u>ISBN</u></th>
            <td>
                <input type="number"  id="isbn" name="isbn">
                <p class="etc">※半角数字</p>
            </td>
        
            <th><u>冊数</u></th>
            <td>
                <input type="number"  id="stock" name="stock">
                <p class="etc">※半角数字</p>
            </td>
        </tr>
    </table>
    <div id="box3">
        <input type="button" value="確認" class="submit">
        <button type="button" name="submit" onclick="location.href='ad'">キャンセル</button>    
    </div>
</form>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection