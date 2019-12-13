<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet"  type="text/css" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LibTest</title>
</head>
<body>
        <header>
                <div id="headLeft">
                        <a href="/lib"><img id="headimg" src="{{ asset('img/book.png') }}" alt="book.png"></a>
                        <a href="/lib">
                            <h1>書籍管理システム</h1>
                        </a>
                </div>
        </header>
        <hr>

    <div id="reset">
            @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
