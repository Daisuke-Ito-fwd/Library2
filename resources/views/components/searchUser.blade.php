<div id="searchBox">
        <form action="select" method="GET">
            @csrf
            
            <table id="searchUser">
                <tr>
                    <th><u>氏名</u></th>
                    <td><input type="text" value="" placeholder="図書" name="name2"></td>
                    <td><input type="text" value="" placeholder="太郎" name="name1"></td>
                </tr>
                <tr>
                    <th><u>フリガナ</u></th>
                    <td><input type="text" value="" placeholder="トショ" name="kana2"></td>
                    <td><input type="text" value="" placeholder="タロウ" name="kana1"></td>
                </tr>
                <tr>
                    <th><u>メールアドレス</u></th>
                    <td><input type="email" value="" name="mail"></td>
                </tr>
                <tr>
                    <th><u>ユーザー種別</u></th>
                    <td>
                        <label><input type="checkbox" value="1" name="typ">管理</label>
                        <label><input type="checkbox" value="2" name="typ">一般</label>
                    </td>
                </tr>
            </table>
        <div id="box3">
            <input type="submit" value="検索" class="submit">
        </div>
        </form>
        </div>