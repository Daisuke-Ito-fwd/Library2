<div id="headLeft">
        <a href="/lib/ad"><img id="headimg" src="{{ asset('img/book.png') }}" alt="book.png" ></a>
        <h1>書籍管理システム</h1>
</div>
<div id="headRight">
        <p id="logType">ログイン中 {{ $typ }} </p>
        <p id="logID">ID ： {{ $mail }}</p>
        <p><input type="button" v-on:click="logout()" value="ログアウト" id="headerButton"></p>
</div>