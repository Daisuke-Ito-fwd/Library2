@extends('layouts.base')

@section('title', 'アカウント追加確認')

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
    <h2>登録内容の確認</h2>
@endsection
@section('box2')
    @if (isset($reqPost))
        @component('components.addUserConf')
            @slot('name2')
                {{ $reqPost['name2'] }}
            @endslot
            @slot('name1')
                {{ $reqPost['name1'] }}
            @endslot
            @slot('kana2')
                {{ $reqPost['kana2'] }}
            @endslot
            @slot('kana1')
                {{ $reqPost['kana1'] }}
            @endslot
            @slot('mail')
                {{ $reqPost['mail'] }}
            @endslot
            @slot('pass')
                {{ $reqPost['pass'] }}
            @endslot
            
            @slot('typ')
                @if ($reqPost['typ'] == 1)
                    <p  name="typ" id="typ">管理</p>
                @else
                    <p  name="typ" id="typ">一般</p>
                @endif
            @endslot
            @slot('hidden')
                @foreach ($reqPost as $key => $value)
                    <input type="hidden" name={{ $key }} value={{ $value }}>
                @endforeach
            @endslot
        @endcomponent
    @else
        @component('components.editUserConf')
            @slot('name2')
             {{ $userInput['name2'] }}
            @endslot
            @slot('name1')
                {{ $userInput['name1'] }}
            @endslot
            @slot('kana2')
                {{ $userInput['kana2'] }}
            @endslot
            @slot('kana1')
                {{ $userInput['kana1'] }}
            @endslot
            @slot('mail')
                {{ $userInput['mail'] }}
            @endslot
            @slot('pass')
                {{ $userInput['pass'] }}
            @endslot

            @slot('typ')
                @if ($userInput['typ'] == 1)
                    <p  name="typ" id="typ">管理</p>
                @else
                    <p  name="typ" id="typ">一般</p>
                @endif
            @endslot
            @slot('hidden')
                @foreach ($userInput as $key => $value)
                    <input type="hidden" name={{ $key }} value={{ $value }}>
                @endforeach
            @endslot

            @slot('pass')
                @if($userInput['pass']=="")
                    <p>変更しない</p>
                @else
                <p type="password" name="pass" id="pass">{{ $str2 = str_repeat('*', strlen($userInput['pass'])) }}</p>
                @endif
            @endslot
        @endcomponent
    @endif

@endsection

@section('footerL')
    
@endsection

@section('footerR')
    
@endsection