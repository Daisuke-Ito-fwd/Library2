@extends('layouts.app')

@section('content')

<form method="POST" action="orgLogin">
    @csrf
    @if (old('email'))
    <p id="error">エラー：  メールアドレスもしくはパスワードが間違っています。</p>
    @endif
    <table id="logForm">
            <tr>
                <th>mail: </th>
                <td><input type="email" name="email" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <th>pass: </th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th id="errorTh"></th>
                <td id="errorTd"></td>
            </tr>
    </table>

   

        <div id="login">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <br>
            <a style="font-size:15px;" class="btn btn-link" href="{{ route('password.request') }}">
                <u>{{ __('パスワードを忘れた方はこちら') }}</u>
            </a>
        </div>
</form>
<hr id="fHr">
@endsection
