<div id="headLeft">
        <a href="/lib/index"><img id="headimg" src="{{ asset('img/book.png') }}" alt="book.png" ></a>
        <a href="/lib/index"><h1>書籍管理システム</h1></a>
</div>
<div id="headRight">
        <p id="logType">ログイン中 {{ $typ }} </p>
        <p id="logID">ID ： {{ $email }}</p>
        <p><input type="button"  v-on:click="onclick" value="ログアウト" id="headerButton" value="ログアウト"></p>
</div>