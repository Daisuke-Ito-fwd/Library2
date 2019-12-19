<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <title>LibTest</title>
</head>

<body>
    <header class="container">
        <div class="row">
            <div id="head2" class="col-12 d-none d-md-flex justify-content-start align-items-end">
                <div>
                    <span id="headerLogoImg"><a href="/lib"><img id="headimg" src="{{ asset('img/book.png') }}"
                                alt="book.png"></a></span>
                </div>
                <div>
                    <a href="/lib">
                        <h1 id="headerLogoText1">書籍管理システム</h1>
                    </a>
                </div>
            </div>
            <div id="head2" class="col-12">
                <div class=" d-md-none d-flex justify-content-center align-items-end">
                    <a href="/lib">
                        <h1 id="headerLogoText2">書籍管理システム</h1>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <div id="underFixed"></div>

    <main>
        <div id="reset" class="p-3">
            @yield('content')
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
