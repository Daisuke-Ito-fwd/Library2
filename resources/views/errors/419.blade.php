<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <script>
        setTimeout("location.href='/lib/logout'", 1000 * 5);

    </script>
    <title>419 token error</title>
    <style>
        .error-wrap {
            padding: 5px 20px;
            border: 1px solid #dcdcdc;
            display: inline-block;
            box-shadow: 0px 0px 8px #dcdcdc;
        }

        h1 {
            font-size: 18px;
        }

        p {
            margin-left: 10px;
        }

    </style>
</head>

<body>
    <div class="error-wrap">
        <section>
            <h1>419 CSRF token error</h1>
            <p>このページへのアクセスルートが不正です。
                <br>
                再度ログインしなおしてください。(5秒後にログインページに戻ります。)
            </p>
        </section>
    </div>
</body>

</html>