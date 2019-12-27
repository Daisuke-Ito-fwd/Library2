@extends('layouts.base')

@section('title', 'アカウント追加確認')

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
<h2>登録内容の確認</h2>
@endsection
@section('box2')
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
@slot('email')
{{ $reqPost['email'] }}
@endslot
@slot('pass')
{{ $reqPost['pass'] }}
@endslot

@slot('typ')
@if ($reqPost['typ'] == 1)
管理
@else
一般
@endif
@endslot
@slot('hidden')
@foreach ($reqPost as $key => $value)
<input type="hidden" name={{ $key }} value={{ $value }}>
@endforeach
@endslot
@endcomponent

@endsection

@section('footerL')

@endsection

@section('footerR')

@endsection
