<div id="searchBox">
        <form action="" method="GET">
            @csrf
        
            <table id="searchUser">
                <tr  class="sHead">
                    <th><u>ユーザー検索</u></th>
                </tr>
                <tr>
                    <th>氏名</th>
                    <td><input type="text" value="" placeholder="図書"></td>
                    <td><input type="text" value="" placeholder="太郎"></td>
                </tr>
                <tr>
                    <th>フリガナ</th>
                    <td><input type="text" value="" placeholder="トショ"></td>
                    <td><input type="text" value="" placeholder="タロウ"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="email" value=""></td>
                </tr>
            </table>
        <div id="box3">
            <input type="submit" value="検索" class="submit">
        </div>
        </form>
        </div>