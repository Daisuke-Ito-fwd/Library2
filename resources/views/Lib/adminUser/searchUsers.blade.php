@extends('layouts.base')

@section('title', 'general')
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
    <h3>ユーザー検索</h3>
    <p class='message'> 
                        登録ユーザーを全て表示する場合は、<u>全て空欄のまま</u>検索ボタンを押してください。
    </p>
@endsection
@section('box2')
    @component('components.searchUser')
    @endcomponent
@endsection

@if(isset($result))
@section('resultBox')
<hr>
<div id="resBoxHead">
        @if ($result == false)
                <div><p>該当する結果はありません。<br>検索内容を変更してください。</p></div>
        @else
        <div ><p id="resultCount">該当 {{ count($result) }} 件</p></div>
        <div id="deleteButton"><input type="submit" value="選択した項目を削除"></div>
        @endif 
    </div>
        
        @if (count($result) !== 0)
        <table id="resTable">
            <tr id="resHead">
                <th></th>
                <th>種別</th>
                <th>氏名</th>
                <th>フリガナ</th>
                <th>メールアドレス</th>
                <th>登録日</th>
                <th></th>
            </tr>
            @foreach ($result as $key)
                <tr id="{{ "resBody".$key->id }}" class="resBody">
                    <td><input type="checkbox" value="{{ $key->id }}"></td>
                    <td>
                        @if($key->typ == 1) 管理 @else 一般 @endif
                    </td>
                    <td>{{ $key->name2.' '.$key->name1 }}</td>
                    <td>{{ $key->kana2.' '.$key->kana1 }}</td>
                    <td>{{ $key->email }}</td>
                    <td>{{ $key->created_at }}</td>
                    <td><form action="/editUser" type="get">
                        <input type="hidden" value="{{ $key->id }}">
                        <input type="button" value="編集" onclick="location.href='edit?id={{ $key->id }}'">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
@endsection
@endif

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection