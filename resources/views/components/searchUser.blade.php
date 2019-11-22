<div id="searchBox">
        <form action="" method="get">
            @csrf
            
            <table id="searchUser">
                <tr>
                    <th><u>氏名</u></th>
                   
                    <td>
                            <input type="text" value="" placeholder="図書" name="name2" value="{{ old('name2', isset($userInput) ? $userInput->name2 : 'test') }}">
                            <input type="text" value="" placeholder="太郎" name="name1" value="">
                    </td>
                </tr>
                <tr>
                    <th><u>フリガナ</u></th>
                    <td>
                    @if ($errors->has('kana2'))
                    <p class="error">{{ $errors->first('kana2') }}</p>
                    @endif
                    @if ($errors->has('kana1'))
                    <p class="error">{{ $errors->first('kana1') }}</p>
                    @endif

                    @isset($kana2)
                        <input type="text" value="" placeholder="トショ" name="kana2" >
                        <input type="text" value="" placeholder="タロウ" name="kana1" >
                    @else
                        <input type="text" value="" placeholder="トショ" name="kana2" >
                        <input type="text" value="" placeholder="タロウ" name="kana1" >
                    @endisset
                    </td>
                </tr>
                <tr>
                    <th><u>メールアドレス</u></th>
                    @isset($mail)
                    <td><input type="email" value="" name="mail" ></td>
                    @else
                    <td><input type="email" value="" name="mail" ></td>
                    @endisset
                </tr>
                <tr>
                    <th><u>ユーザー種別</u></th>
                    <td>
                        @isset($typ)
                        <label><input type="checkbox" value="1" name="typ" >管理</label>
                        <label><input type="checkbox" value="2" name="typ" >一般</label>
                        @else
                        <label><input type="checkbox" value="1" name="typ" >管理</label>
                        <label><input type="checkbox" value="2" name="typ" >一般</label>
                        @endisset
                    </td>
                </tr>
            </table>
        </form>
        </div>