<h4 class="deleteUserModal">下記@{{ countDelete }}件のユーザー情報を削除します。</h4>
    <table class="resTable">
        <tr class="resHead">
            <th>種別</th>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>メールアドレス</th>
            <th>登録日</th>
        </tr>
        <tr v-for='data of deleteData' v-bind:key="kana1" class="resBody">
                <td>@{{ data.typ }}</td>
                <td>@{{ data.name2 }} @{{ data.name1 }}</td>
                <td>@{{ data.kana2 }} @{{ data.kana1 }}</td>
                <td>@{{ data.email }}</td>
                <td>@{{ data.created_at }}</td>
            </tr>

    </table>
