<div id="searchBox">
    <div class="air"></div>
        <form action="" method="GET">
            @csrf
            <table id="search">
                <tr  class="sHead">
                    <th><u>通常検索</u></th>
                </tr>
                <tr>
                    <th>タイトル</th>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <th>フリガナ</th>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <th>著者</th>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <th>出版社</th>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="検索" class="submit"></td>
                </tr>
            </table>
        </form>
        <div id="line"></div>
        <form action="" method="GET">
            @csrf
        
            <table id="searchISBN">
                <tr  class="sHead">
                    <th><u>ISBN検索</u></th>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td><input type="number" value=""></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="ISBN検索" class="submit"></td>
                </tr>
            </table>
        </form>
        <div class="air"></div>
        </div>