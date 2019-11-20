<div id="addBox">
        <form action="insert" method="POST">
            @csrf
            <table id="confUser">
                <tr>
                    <th><u>ユーザー種別</u></th>
                    <td>
                        {{ $typ }}
                    </td>
                </tr>
                <tr>
                    <th><u>氏名</u></th>
                    <td>
                            <p type="text" name="name" id="name" >{{ $name2.' '.$name1}}</p>
                    </td>
                </tr>
                <tr>
                    <th><u>フリガナ</u></th>
                    <td>
                        <p type="text" name="kana" id="kana" >{{ $kana2.' '.$kana1}}</p>
                    </td>
                </tr>
                <tr>
                    <th><u>メールアドレス</u></th>
                    <td>
                        <p type="text" name="mail"  id="mail" >{{ $mail }}</p>
                    </td>
                </tr>
                <tr>
                    <th><u>パスワード</u></th>
                    <td>
                        <p type="password" name="pass" id="pass">{{ $str2 = str_repeat('*', strlen($pass)) }}</p>
                    </td>
                </tr>
            </table>
            <div id="box3">
                     {{ $hidden }}
                    <button type="submit" name="submit" value="user_add" >送信</button>
                    <button type="submit" name="submit" value="back"   >編集</button>       
            </div>
        </form>