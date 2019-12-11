<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vuejs-paginate@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>@yield('title')</title>
</head>

<body class="contents">

    <header>
        @yield('header')
    </header>
    <hr id="hHr">

    <main id="main" v-show="mainSwitch">
        <div class="fullGuard" v-show="fullGuard">

        </div>
        <transition name="loading">
            <div v-show="ClearLoading" id="ClearLoading">
                <img src="{{ asset('img/loading.gif') }}" alt="loading" id="loadingGif">
            </div>
        </transition>
        <div v-show="loading" id="loading">
        </div>
        <div v-show="!loading">
            <div class="box1">
                @yield('userModal')
                @yield('userBox1')
            </div>
            <div class="box2">
                @yield('userBox2')
            </div>
        </div>
    </main>

    <main id="booksMain">
        <div class="fullGuard" v-show="fullGuard">
        </div>
        <transition name="loading">
            <div v-show="ClearLoading" id="ClearLoading">
                <img src="{{ asset('img/loading.gif') }}" alt="loading" id="loadingGif">
            </div>
        </transition>
        <div class="box1">
            @yield('modal')
            @yield('box1')
        </div>
        <div class="box2">
            @yield('box2')
        </div>
        </div>
    </main>

    <hr id="fHr">
    <footer>
       
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
