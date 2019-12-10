<h4>書籍情報の編集</h4>
    <table id="editTable">
        <tr class="editTr">
            <th>タイトル</th>
            <td><input type="text"  v-model="editTitle"></td>
        </tr>
        <tr class="editTr">
            <th>フリガナ</th>
            <td><input type="text"  v-model="editKana"></td>
        </tr>
        <tr class="editTr">
            <th>著者</th>
            <td><input type="text"  v-model="editAuth"></td>
        </tr>
        <tr class="editTr">
            <th>ジャンル</th>
            <td>
                <select v-model="editGenreId" v-on:click="selectGenre">
                    <option v-for='data of genreData' v-bind:value="data.id">@{{ data.genre }}</option>
                </select>
            </td>
        </tr>
        <tr class="editTr">
            <th>出版社</th>
            <td>
                <select v-model="editPublId" v-on:click="selectPubl">
                    <option v-for='data of publData' v-bind:value="data.id">@{{ data.publ }}</option>
                </select>
            </td>
        </tr>
        <tr class="editTr">
            <th>出版日</th>
            <td><input type="date"  v-model="editSDate"></td>
        </tr>
        <tr class="editTr">
            <th>ISBN</th>
            <td><input type="number"  v-model="editIsbn"></td>
        </tr>
        <tr class="editTr">
            <th>在庫</th>
            <td><input type="number"  v-model="editStock"></td>
        </tr>

    </table>
