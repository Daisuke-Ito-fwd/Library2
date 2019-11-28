<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body>
<header>
    @yield('header')
</header>
<hr id="hHr">
<main id="main">
    @yield('test')
    <div class="box1">
            @yield('box1')
    </div>
    <div class="box2">
        @yield('box2')
    </div>
</main>

<hr id="fHr">
<footer>
</footer>
<script src="https://unpkg.com/vuejs-paginate@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>