<h4>書籍情報の編集</h4>
@{{ editGenre }}
@{{ genre }}
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
                <select v-model="editGenre">
                    {{-- <option value=""></option> --}}
                    <option v-for='data of genreData' v-bind:value="data.id">@{{ data.genre }}</option>
                </select>
            </td>
        </tr>
        <tr class="editTr">
            <th>出版社</th>
            <td><input type="text"  v-model="editPubl"></td>
        </tr>
        <tr class="editTr">
            <th>出版日</th>
            <td><input type="text"  v-model="editSDate"></td>
        </tr>
        <tr class="editTr">
            <th>ISBN</th>
            <td><input type="text"  v-model="editIsbn"></td>
        </tr>
        <tr class="editTr">
            <th>在庫</th>
            <td><input type="text"  v-model="editStock"></td>
        </tr>

    </table>
