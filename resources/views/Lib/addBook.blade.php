@extends('layouts.base')

@section('title', '書籍追加')

{{-- @section('header')
    @component('components.header')
    @endcomponent
@endsection --}}

@section('logID', 'xxx@gmail.com')
@section('box1')
    <h2>書籍を追加する</h2>
@endsection
@section('box2')
<div id="addBox">
<form action="" method="GET">
    @csrf
    <table id="addBook">
        <tr>
            <th><u>タイトル</u></th>
            <td>
                <input type="text" id="title" >
            </td>
        </tr>
        <tr>
            <th><u>フリガナ</u></th>
            <td>
                <input type="text"  id="kana">
                <p class="etc">※全角のみ</p>
            </td>
        </tr>
        <tr>
            <th><u>著者</u></th>
            <td>
                <input type="text" id="auth">
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
        </tr>
        <tr>
            <th><u>出版日</u></th>
            <td>
                <input type="date"  id="s_date">
            </td>
        </tr>
        <tr>
            <th><u>ISBN</u></th>
            <td>
                <input type="number"  id="isbn">
                <p class="etc">※半角数字</p>
            </td>
        </tr>
        <tr>
            <th><u>冊数</u></th>
            <td>
                <input type="number"  id="isbn">
                <p class="etc">※半角数字</p>
            </td>
        </tr>
    </table>
    <div id="box3">
        <input type="button" value="確認" class="submit">
        <input type="button" value="キャンセル" class="submit">       
    </div>
</form>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection