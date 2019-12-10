
<div class="resBox" v-show="display">
    <hr>
    <div class="resCount">
    <p>検索結果： @{{ getCount }} 件</p>
    <p class="deleteButton"><button v-show="showDeleteButton"  name="deleteUser" @click="deleteModal">選択した項目を削除</button></p>
    </div>
<table class="resTable">
        <tr class="resHead">
            <th></th>
            <th>種別          <button class="checkSort" name="checkSort" @click="checkSort('typ')">@{{ sortTyp }}</button></th>
            <th>氏名          <button class="checkSort" name="checkSort" @click="checkSort('name')">@{{ sortName }}</button></th>
            <th>フリガナ      <button class="checkSort" name="checkSort" @click="checkSort('kana')">@{{ sortKana }}</button></th>
            <th>メールアドレス<button class="checkSort" name="checkSort" @click="checkSort('email')">@{{ sortEmail }}</button></th>
            <th>登録日        <button class="checkSort" name="checkSort" @click="checkSort('date')">@{{ sortDate }}</button></th>
            <th></th>
        </tr>
        {{--                       ↓ここがcomputedの変数名 --}}
        <tr v-for='(res, i) of getItems'  class="resBody"  v-bind:key="i">
            {{--                             ↓ここで各データのidをふる   ↓ここでチェックを監視                     --}}
                <td><input type="checkbox" v-bind:value="res.id" v-model="deleteId" name='deleteId[]'></td>
                <td>@{{ res.typ }}</td>
                <td>@{{ res.name2 }} @{{ res.name1 }}</td>
                <td>@{{ res.kana2 }}  @{{ res.kana1 }}</td>
                <td>@{{ res.email }}</td>
                <td>@{{ res.created_at }}</td>
                <td>
        {{--      上記と同じ ↓ここで各データのidをふる                                  --}}
                    <button v-bind:value="res.id" v-on:click="getEditId($event)">編集</button>
                </td>

    </table>

    {{-- ページネーション設定 --}}
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
