<h3>書籍の検索・編集・削除</h3>
<div id="searchBox">
    <div id='tables'>
        <table class="search">
            <tr>
                <th>タイトル</th>
                <td><input type="text" v-model="title"></td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td><input type="text" v-model="kana"></td>
            </tr>
            <tr>
                <th>著者</th>
                <td><input type="text" v-model="auth"></td>
            </tr>
        </table>

        <table class="search">
            <tr>
                <th>出版社</th>
                <td>
                    <select v-model="publ" class="selBox">
                        <option value="">
                        <option v-for='data of publData' v-bind:value="data.id">@{{ data.publ }}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>ジャンル</th>
                <td>
                    <select v-model="genre" class="selBox">
                        <option value="">
                        <option v-for='data of genreData' v-bind:value="data.id">@{{ data.genre }}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td><input type="number" v-model="isbn"></td>
            </tr>
        </table>
    </div>
</div>
<p style="color:red; font-size:12px;">@{{ errorMsg }}</p>
<p><button class="submit" v-on:click="searchBooks()">検索</button></p>
