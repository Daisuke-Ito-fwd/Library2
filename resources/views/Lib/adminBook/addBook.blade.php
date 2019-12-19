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
@section('box2')
@if (count($errors) > 0)
<p class="error">エラー：入力内容に問題があります。 再入力してください。</p>
@endif
<h2>書籍の追加</h2>
<form action="addBookConf" method="GET" id="addBookForm">
    <div class="container ">
        <div class="row " id="addBook">
            @csrf

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>タイトル：</p>
                        <input type="text" id="title" name="title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <p class="error">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>フリガナ：</p>
                        <input type="text" id="kana" name="kana" value="{{ old('kana') }}">
                        <p class="etc">※全角カタカナのみ</p>
                        @if($errors->has('kana'))
                        <p class="error">{{ $errors->first('kana') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>著者：</p>
                        <input type="text" id="auth" name="auth" value="{{ old('auth') }}">

                        @if($errors->has('auth'))
                        <p class="error">{{ $errors->first('auth') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>出版日：</p>
                        <input type="date" id="s_date" name="s_date" value="{{ old('s_date') }}">
                        @if($errors->has('s_date'))
                        <p class="error">{{ $errors->first('s_date') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>出版社：</p>
                        <select name="publ" id="publ">
                            {{-- fromDB foreach --}}
                            @foreach ($publ as $key )
                            <option value="{{ $key->id }}">{{ $key->publ }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>ジャンル：</p>
                        <select name="genre" id="genre">
                            {{-- fromDB foreach --}}
                            @foreach ($genre as $key )
                            <option value="{{ $key->id }}">{{ $key->genre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>ISBN：</p>
                        <input type="number" id="isbn" name="isbn" value="{{ old('isbn') }}">
                        <p class="etc">※半角数字</p>
                        @if($errors->has('isbn'))
                        <p class="error">{{ $errors->first('isbn') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="itemTitle">
                        <p>冊数：</p>
                        <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
                        <p class="etc">※半角数字</p>
                        @if($errors->has('stock'))
                        <p class="error">{{ $errors->first('stock') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div id="box3" class='col-12'>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 d-flex justify-content-around" id="addBookButton">
                        <div>
                            <input type="submit" value="確認" class="submit">
                        </div>
                        <div>
                            <button type="button" name="submit" onclick="location.href='index'">キャンセル</button>
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
