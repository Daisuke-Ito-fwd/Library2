<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="app" style="width:100%">
        <p><button @click="displayGraph">グラフ更新</button></p>
        <canvas id="myChart"></canvas>

        ave: @{{ aveList }}
        <br>
        date: @{{ dateList }}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
