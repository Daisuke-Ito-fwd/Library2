@extends('layouts.app')

@section('content')
<div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf
        <table id="logForm">
            <tr>
                <th colspan="2">
                    <p>
                        パスワードリセット用の確認メールを送付します。
                        <br>
                        登録メールアドレスを入力してください。
                    </p>
                </th>
                <th></th>
            </tr>
            <tr>
                <th>
                    <label for="email" >{{ __('mail: ') }}</label>
                </th>
                <td>
                    <input id="logEmail" type="email"  name="email" v-model="forResetEmail"
                    value="{{ old('email') }}" required autocomplete="email" autofocus >
                </td>
            </tr>

            <tr>
                <td colspan="2" style="color:red; font-size:15px; text-align:center;"  v-if="mailConf">
                            <small>このメールアドレスは登録されていません。</small>
                </td>
                <td colspan="2" style="font-size:20px; text-align:center;"  v-if="sendMail">
                    <p>確認メールを送付しました。<br>30分以内に変更手続きを完了してください。</p>
                </td>
            </tr>
            </table>
            
            
            <div id="login">
                <div class="col-md-6 offset-md-4">
                    <button type="button" class="btn btn-primary" v-on:click="checkEmail">
                        {{ __('送信') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
