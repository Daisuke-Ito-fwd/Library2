<div class="container">
    <div class="row" v-show="display" id="resultRow">
        <div class="col-12" id="booksResult">
            <hr>
            <div class="row d-flex justify-content-between">
                <div class="col-3 d-3" id="resCount">
                    <p>検索結果： @{{ getCount }} 件</p>
                </div>
                <div class="col-6 d-6"></div>
                <div class="col-3 d-3">
                    @if ($typ == '1')
                    <p style="text-align:end;" id="deleteButton"><button class="text-nowrap" v-show="showDeleteButton" name="deleteUser"
                            v-on:click="deleteBooksModal">選択項目を削除</button></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 d-none d-lg-block">
            <table id="resTable">
                <tr id="resHead">
                    @if ($typ == '1')
                    <th>選択<br>削除</th>
                    @endif
                    <th>ISBN</th>
                    <th>タイトル <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('title')">@{{ sortTitle }}</button> </th>
                    <th>フリガナ <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('kana')">@{{ sortKana }}</button> </th>
                    <th>著者 <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('auth')">@{{ sortAuth }}</button> </th>
                    <th>ジャンル <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('genre')">@{{ sortGenre }}</button> </th>
                    <th>出版社 <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('publ')">@{{ sortPubl}}</button> </th>
                    <th>出版日 <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('date')">@{{ sortDate }}</button> </th>
                    <th>在庫</th>
                    @if ($typ == '1')
                    <th></th>
                    @endif
                </tr>
                <tr v-for='(res, i) of getItems' id="resBody" v-bind:key="i">
                    @if ($typ == '1')
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
                    @if ($typ == '1')
                    <td><button v-bind:value="res.id" v-on:click="getEditId($event)">編集</button></td>
                    @endif
                </tr>
            </table>
        </div>
        <div class="col-12 d-lg-none" id="resTable2">
            <table id="resTable">
                <tr>
                    @if ($typ == '1')
                    <th class="delchk">削除</th>
                    @endif

                    <th class="align-middle" colspan="4">
                        <div class="row align-items-center">
                            <div class="col-3 ">タイトル<button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('title')">@{{ sortTitle }}</button></div>
                            <div class="col-3">フリガナ<button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('kana')">@{{ sortKana }}</button></div>
                            <div class="col-3">出版社 <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('publ')">@{{ sortPubl}}</div>
                            <div class="col-3">出版日 <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('date')">@{{ sortDate }}</div>
                        </div>
                        <hr id="thHr">
                        <div class="row">
                            <div class="col-3">ISBN</div>
                            <div class="col-3">著者<button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('auth')">@{{ sortAuth }}</button></div>
                            <div class="col-3">ジャンル <button data-toggle="button" aria-pressed="false" class="sortButton" @click="checkSort('genre')">@{{ sortGenre }}</div>
                            <div class="col-3">在庫</div>
                        </div>
                    </th>
                   
                    @if ($typ == '1')
                    <th></th>
                    @endif
                </tr>
                <tr v-for='(res, i) of getItems' id="resBody" v-bind:key="i">
                    @if ($typ == '1')
                    <td class="delchk"><input  type="checkbox" v-bind:value="res.id" v-model="deleteId" name='deleteId[]'></td>
                    @endif
                    <td colspan="4">
                        <div class="row">
                            <div class="col-3">@{{ res.title }}</div>
                            <div class="col-3">@{{ res.kana }}</div>
                            <div class="col-3">@{{ res.publ }}</div>
                            <div class="col-3">@{{ res.s_date }}</div>
                        </div>
                        <hr id="tdHr">
                        <div class="row">
                            <div class="col-3">@{{ res.isbn }}</div>
                            <div class="col-3">@{{ res.auth }}</div>
                            <div class="col-3">@{{ res.genre }}</div>
                            <div class="col-3">@{{ res.stock }}</div>
                        </div>
                    </td>
                    @if ($typ == '1')
                    <td><button class="small" v-bind:value="res.id" v-on:click="getEditId($event)">編集</button></td>
                    @endif
                </tr>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-center" id="paginateBox">

            <paginate :page-count="getPageCount" :page-range="3" :margin-pages="2" :click-handler="clickCallback"
                :prev-text="'≪'" :next-text="'≫'" :container-class="'pagination'" :page-class="'page-item'">
            </paginate>
        </div>
    </div>
</div>
</div>
