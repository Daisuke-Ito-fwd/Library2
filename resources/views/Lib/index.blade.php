<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LibTest</title>
</head>
<body>
<header>
    <div id="headLeft">
    <img id="headimg" src="{{ asset('img/book.png') }}" alt="book.png">
    <h1>書籍管理システム</h1>
    </div>
</header>
<hr id="hHr">
<main>
    <div id="box1">
        <h2>ログイン</h2>
        <h4>メールアドレスとパスワードを入力してください。</h4>
    </div>
    <div id="box2">
    <form method="POST" action="orgLogin">
        @csrf
        @if (old('email'))
        <p id="error">エラー：  メールアドレスもしくはパスワードが間違っています。</p>
        {{-- @else ($error == true)
        <p id="error">エラー：  メールアドレスもしくはパスワードが間違っています。</p> --}}
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
        <input  type="submit" name="submit" value="ログイン">
        </div>
    </form>
</div>
{{-- <p id="entry">アカウント未登録の方は<a href="">こちら</a>から登録してください。</p>            </tr> --}}
    <hr id="fHr">
</main>

<footer>
</footer>
</body>
</html>