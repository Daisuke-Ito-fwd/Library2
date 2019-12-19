@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="logForm">
        <div class="card-body">
            <h2>パスワードの更新</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                @error('email')
                <small style="color:red; text-align:center;" class="invalid-feedback" role="alert">
                    {{ $message }}
                </small>
                @enderror
                <table id="resetPassForm" class="mx-auto">

                    <tr class="form-group row">
                        <th for="email" class="col-md-4 col-form-label text-md-right">メールアドレス :</label>

                        <td class="col-md-7">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        </td>
                    </tr>

                    <tr class="form-group row">
                        <th for="password" class="col-md-4 col-form-label text-md-right">パスワード :</label>

                        <td class="col-md-7">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr class="form-group row">
                        <th for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認用) :</label>

                        <td class="col-md-7">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </td>
                    </tr>
                </table>
                <div id="login">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>

@endsection
