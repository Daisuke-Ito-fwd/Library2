
<hr>
@{{ deleteId }}
<div class="booksResult"  v-show="display">
    <div class="resCount" >
                <p>検索結果： @{{ getCount }} 件</p>
                @if ($typ  == '1')
                <p class="deleteButton"><button  name="deleteUser" v-on:click="deleteBooksModal">選択した項目を削除</button></p>
                @endif
                </div>
    <table class="resTable">
        <tr class="resHead">
                @if ($typ  == '1')
                <th></th>
                @endif
            <th>ISBN</th>
            <th>タイトル   <button class="checkSort" @click="checkSort('title')">@{{ sortTitle }}</button> </th>
            <th>フリガナ   <button class="checkSort" @click="checkSort('kana')">@{{ sortKana }}</button> </th>
            <th>著者       <button class="checkSort" @click="checkSort('auth')">@{{ sortAuth }}</button> </th>
            <th>ジャンル   <button class="checkSort" @click="checkSort('genre')">@{{ sortGenre }}</button> </th>
            <th>出版社     <button class="checkSort" @click="checkSort('publ')">@{{ sortPubl}}</button> </th>
            <th>出版日     <button class="checkSort" @click="checkSort('date')">@{{ sortDate }}</button> </th>
            <th>在庫</th>
            @if ($typ  == '1')
            <th></th>
            @endif
        </tr>
        <tr v-for='(res, i) of getItems'  class="resBody"  v-bind:key="i">
            @if ($typ  == '1')
            <td><input type="checkbox" v-bind:value="res.id" v-model="deleteId" name='deleteId[]'></td>
            @endif
            <td>@{{ res.isbn }}</td>
            <td>@{{ res.title }}</td>
            <td>@{{ res.kana }}</td>
            <td>@{{ res.auth }}</td>
            <td>@{{ res.genre }}</td>
            <td>@{{ res.publ }}</td>
            <td>@{{ res.s_date }}</td>
            <td>@{{ res.stock }}</td>
            @if ($typ  == '1')
            <td><button v-bind:value="res.id" v-on:click="getEditId($event)">編集</button></td>
            @endif
        </tr>
    </table>
    
<paginate   
    :page-count="getPageCount"
    :page-range="3"
    :margin-pages="2"
    :click-handler="clickCallback"
    :prev-text="'≪'"
    :next-text="'≫'"
    :container-class="'pagination'"
    :page-class="'page-item'">
</paginate>
</div>