
<div class="suBox">
<form action="" method="get">
            @csrf
            <table class="searchUser">
                <tr>
                    <th><u>氏名</u></th>
                   
                    <td>
                        
                        <input type="text" v-model="name2" placeholder="図書" name="name2" value="{{ old('name2', isset($userInput) ? $userInput->name2 : '') }}">
                        <input type="text" v-model="name1" placeholder="太郎" name="name1" value="{{ old('name1', isset($userInput) ? $userInput->name1 : '') }}">
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

                        <input type="text" v-model="kana2" value="{{ old('kana2', isset($userInput) ? $userInput->kana2 : '') }}" placeholder="トショ" name="kana2" >
                        <input type="text" v-model="kana1" value="{{ old('kana1', isset($userInput) ? $userInput->kana1 : '') }}" placeholder="タロウ" name="kana1" >
                    </td>
                </tr>
                <tr>
                    <th><u>メールアドレス</u></th>
                    <td><input type="email" v-model="email" value="{{ old('email', isset($userInput) ? $userInput->email : '') }}" name="email" ></td>
                </tr>
                <tr>
                    <th><u>ユーザー種別</u></th>
                    <td>
                        <label><input type="radio" v-model="typ" value="1" name="typ" >管理</label>
                        <label><input type="radio" v-model="typ" value="2" name="typ" >一般</label>
                    </td>
                </tr>
            </table>
        </form>
        <p style="text-align: center"><button v-on:click="searchUser()">検索</button></p>
        

</div>
