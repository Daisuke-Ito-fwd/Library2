<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/origin.js') }}"></script>
<body>
<header>
    @yield('header')
</header>
<hr id="hHr">
<main>
    @yield('test')
    <div id="box1">
            @yield('box1')
    </div>
    <div id="box2">
        @yield('box2')
    </div>
</main>

<hr id="fHr">
<footer>
    <div id="right">
        @yield('footerR')
    </div>

    <div id="left">
        @yield('footerL')
        <p><input type="button" onclick="location.href='logout'" value="ログアウト"></p>
    </div>
</footer>
</body>
</html>