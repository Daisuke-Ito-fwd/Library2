<div class="row">
    <div id="head2">
        <div  class="col-12 d-none d-md-flex justify-content-start align-items-end">
            <div>
                <span id="headerLogoImg"><a href="/lib/index"><img id="headimg" src="{{ asset('img/book.png') }}"
                            alt="book.png"></a></span>
            </div>
            <div>
                <a href="/lib/index">
                    <h1 id="headerLogoText1">書籍管理システム</h1>
                </a>
            </div>
            <div class="dropdown">
                <!-- 切替ボタンの設定 -->
                <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    user menu
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <span class="dropdown-item disabled">ログイン中 {{ $typ }} </span>
                    <span class="dropdown-item disabled">ID ： {{ $email }}</span>
                    <div class="dropdown-divider"></div>
                    <a><button id="logout" v-on:click="onclick" class="dropdown-item">ログアウト</button></a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="head3" class="col-12">
        <div class=" d-md-none d-flex justify-content-center ">
            <a href="/lib/index" class="align-items-end">
                <h1 id="headerLogoText2" >書籍管理システム</h1>
            </a>

            <div class="btn-group dropleft">
                <button type="button" id="dropleft" class="btn-group btn-outline-dark drodown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">◀</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <span class="dropdown-item disabled">ログイン中 {{ $typ }} </span>
                    <span class="dropdown-item disabled">ID ： {{ $email }}</span>
                    <div class="dropdown-divider"></div>
                    <a><button id="logout" v-on:click="onclick" class="dropdown-item">ログアウト</button></a>
                </div>
            </div>

        </div>
    </div>
</div>
