<div class="suBox">
    <form action="" method="get">
        @csrf
        <table class="searchUser">
            <tr>
                <th>氏名</th>

                <td>
                    <input type="text" v-model="name2" placeholder="図書" name="name2">
                    <input type="text" v-model="name1" placeholder="太郎" name="name1">
                </td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td>
                    @if ($errors->has('kana2'))
                    <p class="error">{{ $errors->first('kana2') }}</p>
                    @endif
                    @if ($errors->has('kana1'))
                    <p class="error">{{ $errors->first('kana1') }}</p>
                    @endif

                    <input type="text" v-model="kana2"  placeholder="トショ" name="kana2">
                    <input type="text" v-model="kana1"  placeholder="タロウ" name="kana1">
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><input placeholder="tosyokan@example.net" type="email" v-model="email" name="email" class="tdInput"></td>
            </tr>
            <tr>
                <th>ユーザー種別</th>
                <td>
                    <label><input type="radio" v-model="typ" value="1" name="typ">管理</label>
                    <label><input type="radio" v-model="typ" value="2" name="typ">一般</label>
                </td>
            </tr>
        </table>
    </form>
    <p style="text-align: center; color:red; font-size:12px;">@{{ errorMsg }}</p>
    <p style="text-align: center"><button v-on:click="searchUser()">検索</button></p>
</div>
