<h4>ユーザー情報の編集</h4>
    <table id="editTable" v-for='data of editData' v-bind:key="kana1">
        <tr class="editTr">
            <th>氏名</th>
            <td><input type="text" v-bind:value="data.name2"> <input type="text" v-bind:value="data.name1"></td>
        </tr>
        <tr class="editTr">
            <th>フリガナ</th>
            <td><input type="text" v-bind:value="data.kana2"> <input type="text" v-bind:value="data.kana1"></td>
        </tr>
        <tr class="editTr">
            <th>メールアドレス</th>
            <td><input type="text" v-bind:value="data.email"></td>
        </tr>

    </table>
