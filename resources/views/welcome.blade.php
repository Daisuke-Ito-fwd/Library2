<!DOCTYPE html>
<html lang="ja">
<head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vue.js</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="test">
    <button  v-on:click="test">value</button>
    <button  v-on:click="hello">confirm</button>
</div>
<div id="timer">
                {{-- ” @ ” {{ ～～～ }} bladeテンプレートと " {} " の仕様が被るため、＠前置で区分けする。--}}
        <p>著者情報:@{{ author.name }} (@{{ author.company }})</p>

</div>

    <div id="app">
            <label>
                名前：<input type="text" v-model="name"/>
            </label>
            <p>入力値: @{{ upperName }}</p>
        </div>


    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>




</body>
</html>