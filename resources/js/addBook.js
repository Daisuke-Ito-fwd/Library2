import Axios from "axios"
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)
Vue.component('paginate', VuejsPaginate)
var deleteBooksModal = {
    template: `
      <div id="overlay">
        
          <div id="content">
          <p><slot></slot></p>
          <div class='deleteConf'>
          <button v-on:click="deleteEnd">削除</button>
          <button v-on:click="closeEvent">キャンセル</button>
          </div>
          </div>
      </div>
      `,

    methods: {
        closeEvent: function () {
            //↓親に渡す
            this.$emit('from-child')
        },

        deleteEnd: function () {
            this.$emit('delete-end')
        }
    }
}

var editBookModal = {
    template:`
    <div id="overlay-edit">
        <div id="content-edit">
            <p><slot></slot></p>
            <div class='editConf'>
                <button v-on:click="editConf">確認</button>
                <button v-on:click="closeEvent">キャンセル</button>
            </div>
            
        </div>
    </div>
    `,
    methods: {
        closeEvent: function () {
            //↓親に渡す
            this.$emit('from-child')
        },

        editConf: function () {
            this.$emit('edit-conf')
        }
    }
}

var editConfBookModal = {
    template: `
        <div id="book-edit">
            <p><slot></slot></p>
                <div class='editConf'>
                    <button v-on:click="update">登録</button>
                    <button v-on:click="reEdit">編集</button>
                </div>
                
        </div>
    `,
    methods: {
        update: function () {
            this.$emit('edit-update')
        },

        reEdit: function () {
            this.$emit('re-edit')
        },
    }
}

new Vue({
    el: '#booksMain',
    
    components:{
        'delete-books-modal':deleteBooksModal,
        'edit-book-modal'  :editBookModal,
        'edit-conf-book-modal'  :editConfBookModal,

    },

    data:{
        ClearLoading: false,
        title :'',
        kana  :'',
        auth  :'',
        publ  :'',
        isbn  :'',
        genre :'',
        genreData:[],
        publData:[],
        errorMsg : '',
        // delete
        deleteId: [],
        deleteData: '',
        countDelete: '',
        showDeleteButton:'',
        // edit
        editId:'',
        editGenreId:'',
        editData:'', 
        editTitle:'',
        editKana:'',
        editAuth:'',
        editPubl:'',
        editPublConf:'',
        editGenre:'',
        editGenreConf:'',
        editStock:'',
        editIsbn :'',
        editSDate:'',
        result: [],
        display: false,
        getCount: '', //件数取得
        parPage: 10, //paginate用 
        currentPage: 1, //paginate用 
        mainSwitch:false,
        deleteContent:false,
        editContent:false,
        editConfContent:false,
        editConfData:'',
        // sort
        desc         : false,
        sortTitle    : '▼',
        sortKana     : '▼',
        sortGenre    : '▼',
        sortAuth     : '▼',
        sortPubl     : '▼',
        sortDate     : '▼',
        whatCheck    : '',
    },

    methods: {
        checkSort: function(key) {
            // ソートのキーを取得
            this.whatCheck = key;
            // 矢印の制御、昇降切り替え
            
            if(this.whatCheck == 'title'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortTitle = '▲'; 

                    this.result.sort(function(a,b){
                        if(a.title < b.title) return -1;
                        if(a.title > b.title) return 1;
                        return 0;

                    })
                }else{
                    this.desc = false; 
                    this.sortTitle = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.title > b.title) return -1;
                        if(a.title < b.title) return 1;
                        return 0;
                    })
                }
            }else if(this.whatCheck == 'kana'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortKana = '▲'; 
                    this.result.sort(function(a,b){
                        if(a.kana < b.kana) return -1;
                        if(a.kana > b.kana) return 1;
                        return 0;

                    })
                }else{
                    this.desc = false; 
                    this.sortKana = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.kana > b.kana) return -1;
                        if(a.kana < b.kana) return 1;
                        return 0;
                    })
                }
            }else if(this.whatCheck == 'publ'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortPubl = '▲'; 
                    this.result.sort(function(a,b){
                        if(a.publ < b.publ) return -1;
                        if(a.publ > b.publ) return 1;
                        return 0;
                    })
                }else{
                    this.desc = false; 
                    this.sortPubl = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.publ > b.publ) return -1;
                        if(a.publ < b.publ) return 1;
                        return 0;
                    })
                }
            }else if(this.whatCheck == 'auth'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortAuth = '▲'; 
                    this.result.sort(function(a,b){
                        if(a.auth < b.auth) return -1;
                        if(a.auth > b.auth) return 1;
                        return 0;
                    })

                }else{
                    this.desc = false; 
                    this.sortAuth = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.auth > b.auth) return -1;
                        if(a.auth < b.auth) return 1;
                        return 0;
                    })
                }
            }else if(this.whatCheck == 'date'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortDate = '▲'; 
                    this.result.sort(function(a,b){
                        if(a.s_date < b.s_date) return -1;
                        if(a.s_date > b.s_date) return 1;
                        return 0;

                    })
                }else{
                    this.desc = false; 
                    this.sortDate = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.s_date > b.s_date) return -1;
                        if(a.s_date < b.s_date) return 1;
                        return 0;
                    })
                }
            }else if(this.whatCheck == 'genre'){
                if(this.desc == false){ 
                    this.desc = true; 
                    this.sortGenre = '▲'; 
                    this.result.sort(function(a,b){
                        if(a.genre < b.genre) return -1;
                        if(a.genre > b.genre) return 1;
                        return 0;

                    })
                }else{
                    this.desc = false; 
                    this.sortGenre = '▼' ;
                    this.result.sort(function(a,b){
                        if(a.genre > b.genre) return -1;
                        if(a.genre < b.genre) return 1;
                        return 0;
                    })  
                }               
            }
        },

        allBooks: function(){
            Axios.post('/api/allBooks').then((res)=>{
                this.result=res.data;
            })
        },

        searchBooks: function(){
            if(this.title == "" && this.kana =="" && this.genre=="" && this.auth=="" && this.publ=="" && this.isbn==""){
                this.errorMsg = '検索キーワードを最低１項目入力してください。'
            }else{
                if(this.kana !== ''){
                    if(this.kana.match(/^[ァ-ヶー　]+$/)){
                        this.errorMsg ="";

                        this.CLOpen();
                        setTimeout(() => {
                            this.ClearLoading = false;
                        }, 1000);



                        var form = new FormData();
                        form.append('title', this.title);
                        form.append('kana', this.kana);
                        form.append('genre', this.genre);
                        form.append('auth', this.auth);
                        form.append('publ', this.publ);
                        form.append('isbn', this.isbn);

                        Axios.post('/api/searchBooks', form).then((res)=>{
                            this.result=res.data;
                            this.getCount = Object.keys(this.result).length;
                            this.currentPage=1;
                            if (this.getCount == 0) {
                                alert('該当するデータはありません。\n別のキーワードで検索してください。')
                            }
                        
                        })
                    }else{
                        this.errorMsg ="フリガナは全角カタカナで入力してください。";
                    }

                }else{
                     this.errorMsg ="";

                     this.CLOpen();
                     setTimeout(() => {
                         this.ClearLoading = false;
                     }, 1300);
     

                        var form = new FormData();
                        form.append('title', this.title);
                        form.append('kana', this.kana);
                        form.append('genre', this.genre);
                        form.append('auth', this.auth);
                        form.append('publ', this.publ);
                        form.append('isbn', this.isbn);

                        Axios.post('/api/searchBooks', form).then((res)=>{
                            this.result=res.data;
                            this.getCount = Object.keys(this.result).length;
                            this.currentPage=1;
                            if (this.getCount == 0) {
                                alert('該当するデータはありません。\n別のキーワードで検索してください。')
                            }
                        
                        })
                }
            }
        },

        CLOpen: function(){
            this.ClearLoading = true;
        },

        clickCallback: function (pageNum) {
            this.currentPage = Number(pageNum);
        },

        displayOnOff: function () {
            if (this.getCount > 0) {
                this.display = true;
            } else {
                this.display = false;
            }
        },

        deleteBooksModal: function () {
            this.deleteContent = true

            // https://qiita.com/hirakuma/items/fd7b6492939951190496
            this.deleteData = this.result.filter(x => this.deleteId.includes(x.id));
            this.countDelete = Object.keys(this.deleteData).length;

        },

        getEditId: function(e){
            this.editId='';
            this.editId = e.target.value;
            this.editModal();
        },

        editModal:function(){
            this.editData = this.result.filter(x => x.id == this.editId);
            this.editTitle= this.editData[0]['title'];
            this.editKana= this.editData[0]['kana'];
            this.editAuth= this.editData[0]['auth'];
            this.editPublId= this.publData[0]['publ'];
            
            var eg = this.genreData.filter(x => x.genre == this.editData[0]['genre']);
                this.editGenreId= eg[0]['id'];
            var ep = this.publData.filter(y => y.publ == this.editData[0]['publ']);
                this.editPublId= ep[0]['id'];
            
            this.editStock= this.editData[0]['stock'];
            this.editIsbn= this.editData[0]['isbn'];
            this.editSDate= this.editData[0]['s_date'];
            this.editContent = true
        },

        editUpdate: function(){
            var form =this.editConfData;
            axios.post('/api/updateBook', form).then((res) => {
                alert('書籍情報を更新しました。');
                this.closeModal();
                this.searchBooks();
            }).catch((error) => {
                alert('false');
                console.log(error);
                this.closeModal();
            });
        },

        reEdit: function(){
            this.closeModal();
            this.editContent = true;
        },

        closeModal: function () {
            this.editData='';
            this.deleteContent = false
            this.editContent = false
            this.editConfContent = false
        },

        deleteEnd: function () {
            var params = new FormData();
            // https://readouble.com/laravel/6.x/ja/eloquent.html ソフトデリートを使うと管理が楽？ 今回は使わず
            params.append("id", this.deleteId);
            axios.post('/api/deleteBooks', params).then((res) => {
                alert('書籍情報を'+this.countDelete+'件削除しました。')
                this.deleteId=[];
                this.searchBooks();
                this.closeModal();
                
            }).catch((error) => {
                console.log(this.deleteId)
                alert('false');
                console.log(error);
                this.showContent = false
            });

        },

        showEditConf: function(){
            var eg = this.genreData.filter(x => x.id == this.editGenreId);
                this.editGenre = eg[0]['genre'];
            var ep = this.publData.filter(y => y.id == this.editPublId);
                this.editPubl = ep[0]['publ'];

            var form = new FormData();
            form.append('id'    , this.editId);
            form.append('title' , this.editTitle);
            form.append('kana'  , this.editKana);
            form.append('auth'  , this.editAuth);
            form.append('publ'  , this.editPublId);
            form.append('genre' , this.editGenreId);
            form.append('s_date', this.editSDate);
            form.append('stock' , this.editStock);
            form.append('isbn'  , this.editIsbn);
            this.editConfData = form;
            // this.closeModal();
            this.editConfContent = true;
        },

        selectGenre: function(){
            var arr = this.genreData.filter(x => this.editGenreId.includes(x.id))
            this.editGenre=arr['genre']
        },

        selectPubl: function(){
            var arr = this.publData.filter(x => this.editPublId.includes(x.id))
            this.editPubl = arr['publ']
        }
    },

    computed: {
        // ↓ここで結果を切り出し,変数として返しているのでblade側のv-forの値をこの変数名に変える。
        getItems: function () {
            let current = this.currentPage * this.parPage;
            let start = current - this.parPage;
            // return this.items.slice(start, current);
            return this.result.slice(start, current);
        },
        getPageCount: function () {
            // return Math.ceil(this.items.length / this.parPage);
            return Math.ceil(this.result.length / this.parPage);
        }
    },

    created: function(){
            Axios.post('/api/books_data').then((res)=>{
                this.genreData=res.data['genre'];
                this.publData=res.data['publ'];
            })
          

            if (this.getCount > 0) {
                this.display = true;
            } else {
                this.display = false;
            };

            this.mainSwitch=true;
    },

    updated: function () {
        if (this.getCount > 0) {
            this.display = true;
        } else {
            this.display = false;
        }

        if(this.deleteId == ''){
            this.showDeleteButton = false;
        }else{
            this.showDeleteButton = true;
        }
        
        
        
    },
})
