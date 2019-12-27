<div id="addBox">
    <form action="addUserConf" method="POST">
        @csrf
        <table id="addUser">
            @if (count($errors) > 0)
            <th class="error">エラー</th>
            <td class="error">入力内容に問題があります。 再入力してください。</td>
            @endif
            <tr>
                <th></th>
                <td>
                    @if($errors->has('typ'))
                    <p class="error">{{ $errors->first('typ') }}</p>
                    @endif
                </td>
            </tr>
            <tr>

                <th>種別</th>
                <td>
                    <label><input type="radio" name="typ" value="1" {{ old('typ') == '1' ? 'checked' : '' }}>管理</label>
                    <label><input type="radio" name="typ" value="2" {{ old('typ') == '2' ? 'checked' : '' }}>一般</label>
                </td>
            </tr>
            <tr>
                <th>氏名</th>
                <td>
                    @if ($errors->has('name2'))
                    <p class="error">{{ $errors->first('name2') }}</p>
                    @endif
                    @if($errors->has('name1'))
                    <p class="error">{{ $errors->first('name1') }}</p>
                    @endif
                    <input type="text" name="name2" placeholder="図書" id="name2" value="{{ old('name2') }}">
                    <input type="text" name="name1" placeholder="太郎" id="name1" value="{{ old('name1') }}">
                </td>
            </tr>
            <tr>
                <th>フリガナ</th>
                <td>
                    @if ($errors->has('kana2'))
                    <p class="error">{{ $errors->first('kana2') }}</p>
                    @endif
                    @if($errors->has('kana1'))
                    <p class="error">{{ $errors->first('kana1') }}</p>
                    @endif
                    <input type="text" name="kana2" placeholder="トショ" id="kana2" value="{{ old('kana2') }}">
                    <input type="text" name="kana1" placeholder="タロウ" id="kana1" value="{{ old('kana1') }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <p class="etc">※全角のみ</p>
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                    @endif
                    <input type="text" name="email" placeholder="books@library.com" id="email"
                        value="{{ old('email') }}">
                    <br>
                    <input type="text" name="emailConf" placeholder="books@library.com(確認用)" id="emailConf"
                        value="{{ old('emailConf') }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <p class="etc">
                        ※半角英数字のみ
                        <br>
                        ※重複するメールアドレスは登録できません。
                    </p>
                </td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>
                    @if ($errors->has('pass'))
                    <p class="error">{{ $errors->first('pass') }}</p>
                    @endif
                    <input type="password" name="pass" value="" placeholder="" id="pass">
                    <br>
                    <input type="password" name="passConf" value="" placeholder="確認用" id="passConf">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <p class="etc">※半角英数字のみ , 8文字以上</p>
                </td>
            </tr>
        </table>
        <div class="container">
            <div class="row" id="box3">
                <div class="col-2"></div>
                <div class="col-8 d-flex justify-content-around" id="addBookButton">
                    <div>
                        <button type="submit" name="submit" value="go">確認</button>
                    </div>
                    <div>
                        <button type="button" name="submit" onclick="location.href='index'">キャンセル</button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </form>
