<h4 class="editUserModal">ユーザー情報の編集</h4>
<table id="editTable">
    <tr class="editTr">
        <th>氏名</th>
        <td><input type="text" v-model="editName2"> <input type="text" v-model="editName1"></td>
    </tr>
    <tr class="editTr">
        <th>フリガナ</th>
        <td><input type="text" v-model="editKana2"> <input type="text" v-model="editKana1"></td>
    </tr>
    <tr class="editTr">
        <th>メールアドレス</th>
        <td><input type="text" v-model="editEmail" class="tdInput"></td>
    </tr>
    <tr class="editTr">
        <th>パスワード<br><small>（変更する場合のみ入力してください。）</small></th>
        <td>
            <input type="password" v-model="editPass" class="tdInput">
            <input type="password" placeholder="確認用" v-model="editPassConf" class="tdInput">
        </td>
    </tr>


</table>
<p style="text-align: center; color:red; font-size:12px;">@{{ errorMsgModal }}</p>
