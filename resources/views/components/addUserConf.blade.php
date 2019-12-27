<div id="confUser">

    <table id="addBookTable">
        <tr>
            <th>ユーザー種別</th>
            <td>
                {{ $typ }}
            </td>
        </tr>
        <tr>
            <th>氏名</th>
            <td>
                {{ $name2.' '.$name1}}
            </td>
        </tr>
        <tr>
            <th>フリガナ</th>
            <td>
                {{ $kana2.' '.$kana1}}
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                {{ $email }}
            </td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                {{ $str2 = str_repeat('*', strlen($pass)) }}
            </td>
        </tr>
    </table>
    <form action="insert" method="POST">
        @csrf
        {{ $hidden }}
        <div class="container">
            <div class="row">
                <div id="box3" class='col-12'>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 d-flex justify-content-around" id="addBookButton">
                            <button type="submit" name="submit" value="user_add">登録</button>
                            <button type="submit" name="submit" value="back">編集</button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
