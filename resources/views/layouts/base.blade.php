<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <title>@yield('title')</title>
</head>

<body class="contents">

    <header>
        <div id="header" class="container">
            @yield('header')
            <hr id="hHr">
        </div>

    </header>
    <div id="underFixed"></div>
    <main>
        <div id="main" v-show="mainSwitch">

            <div class="fullGuard" v-show="fullGuard">

            </div>
            <transition name="loading">
                <div v-show="ClearLoading" id="ClearLoading">
                    <img src="{{ asset('img/loading.gif') }}" alt="loading" id="loadingImg">
                </div>
            </transition>
            <div v-show="loading" id="loading">
            </div>
            <div v-show="!loading">
                <div id="box1">
                    @yield('userModal')
                    @yield('userBox1')
                </div>
                <div id="box2">
                    @yield('userBox2')
                </div>
            </div>
        </div>
    </main>

    <main id="booksMain">
        <div class="fullGuard" v-show="fullGuard">
        </div>
        <transition name="loading">
            <div v-show="ClearLoading" id="ClearLoading">
                <img src="{{ asset('img/loading.gif') }}" alt="loading" id="loadingImg">
            </div>
        </transition>
        <div id="box1">
            @yield('modal')
            @yield('box1')
        </div>
        <div id="box2">
            @yield('box2')
        </div>
        <div id="reset" hidden></div>
    </main>

    <hr id="fHr">
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    {{-- <script src="https://unpkg.com/vuejs-paginate@latest"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
