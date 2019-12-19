@extends('layouts.app')

@section('content')

<form method="POST" action="orgLogin">
    @csrf
    @if (old('email'))
    <p id="error">エラー：  メールアドレスもしくはパスワードが間違っています。</p>
    @endif

<div class="container"> 
    <div class="row" id="logForm"> 
        <div class="col-12" id="h2"><h2>ログイン</h2></div>

        <div class="col-12">
            <table id="logTable" class="mx-auto">
                <tbody >
                    <tr>
                        <th>mail: </th>
                        <td><input placeholder="sample@test.net" type="email" name="email" value="{{ old('email') }}"></td>
                    </tr>
                    <tr>
                        <th>pass: </th>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <th id="errorTh"></th>
                        <td id="errorTd"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    

            <div class="col-12" id="login">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                <br>
                <a style="font-size:15px;" class="btn btn-link" href="{{ route('password.request') }}">
                    <u>{{ __('パスワードを忘れた方はこちら') }}</u>
                </a>
            </div>
    </div>
</div>
</form>
<hr id="fHr">
@endsection
