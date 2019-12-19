@extends('layouts.app')

@section('content')
<transition name="loading">
    <div v-show="ClearLoading" id="ClearLoading">
        <img src="{{ asset('img/loading.gif') }}" alt="loading" id="loadingImg">
    </div>
</transition>
<div class="container">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="row" id="logForm">
            <div class="col-12" id="login">
                <p>
                    パスワードリセット用の確認メールを送付します。
                    <br>
                    登録メールアドレスを入力してください。
                </p>

            </div>
            <table id="logTable" class="mx-auto">
                <tr>
                    <th>mail:</th>
                    <td>
                        <input id="logEmail" type="email" name="email" v-model="forResetEmail"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="color:red; font-size:15px; text-align:center;" v-if="mailConf">
                        <small>このメールアドレスは登録されていません。</small>
                    </td>
                </tr>
            </table>
            <div class="col-12" v-if="sendMail">
                <p>
                    確認メールを送付しました。
                    <br>
                    30分以内に変更手続きを完了してください。
                </p>

            </div>
            <div class="col-12" id="login">
                <button type="button" class="btn btn-primary" v-on:click="checkEmail">
                    {{ __('送信') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
