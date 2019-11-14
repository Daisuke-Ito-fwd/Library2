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
<form action="addBookConf" method="GET">
    @csrf
    @if (count($errors) > 0)
    <p class="error">エラー：入力内容に問題があります。 再入力してください。</p>
    <p class="error">===================================================</p>
    @endif
                    <table id="addBook">
        <tr>
            <th><u>タイトル</u></th>
            <td>
                    @if($errors->has('title'))
                    <p class="error">{{ $errors->first('title') }}</p>
                    @endif
                <input type="text" id="title" name="title" value="{{ old('title') }}">
            </td>
            <th><u>フリガナ</u></th>
            <td>
                    @if($errors->has('kana'))
                    <p class="error">{{ $errors->first('kana') }}</p>
                    @endif
                <input type="text"  id="kana" name="kana" value="{{ old('kana') }}">
                <p class="etc">※全角のみ</p>
            </td>
        </tr>
        <tr>
            <th><u>著者</u></th>
                <td>
                        @if($errors->has('auth'))
                        <p class="error">{{ $errors->first('auth') }}</p>
                        @endif
                    <input type="text" id="auth" name="auth" value="{{ old('auth') }}">
                </td>
            <th><u>出版日</u></th>
                <td>
                        @if($errors->has('s_date'))
                        <p class="error">{{ $errors->first('s_date') }}</p>
                        @endif
                    <input type="date"  id="s_date" name="s_date" value="{{ old('s_date') }}">
                </td>
        </tr>
        <tr>
            <th><u>出版社</u></th>
            <td>
                <select name="publ" id="publ" >
                    {{-- fromDB foreach --}}
                    <option value="1">dummy</option>
                    <option value="2">dummy</option>
                    <option value="3">dummy</option>
                </select>
            </td>
       
            <th><u>ジャンル</u></th>
            <td>
                <select name="genre" id="genre">
                    {{-- fromDB foreach --}}
                    <option value="1">dummy</option>
                    <option value="2">dummy</option>
                    <option value="3">dummy</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <th><u>ISBN</u></th>
            <td>
                    @if($errors->has('isbn'))
                    <p class="error">{{ $errors->first('isbn') }}</p>
                    @endif
                <input type="number"  id="isbn" name="isbn" value="{{ old('isbn') }}">
                <p class="etc">※半角数字</p>
            </td>
        
            <th><u>冊数</u></th>
            <td>
                    @if($errors->has('stock'))
                    <p class="error">{{ $errors->first('stock') }}</p>
                    @endif
                <input type="number"  id="stock" name="stock" value="{{ old('stock') }}">
                <p class="etc">※半角数字</p>
            </td>
        </tr>
    </table>
    <div id="box3">
        <input type="submit" value="確認" class="submit">
        <button type="button" name="submit" onclick="location.href='ad'">キャンセル</button>    
    </div>
</form>
@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection