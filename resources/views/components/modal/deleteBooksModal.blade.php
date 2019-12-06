<h4 class="deleteBookModal">下記@{{ countDelete }}件の書籍情報を削除します。</h4>
    <table class="resTable">
        <tr class="resHead">
            <th>タイトル</th>
            <th>著者</th>
            <th>ジャンル</th>
            <th>出版社</th>
            <th>出版日</th>
        </tr>
        <tr v-for='data of deleteData' v-bind:key="title" class="resBody">
                <td>@{{ data.title }}</td>
                <td>@{{ data.auth }}</td>
                <td>@{{ data.genre }}</td>
                <td>@{{ data.publ }}</td>
                <td>@{{ data.s_date }}</td>
            </tr>
            @{{ deleteId }}

    </table>
