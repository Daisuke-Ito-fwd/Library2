require('./bootstrap');
// ログアウト##################################################################
new Vue({
    el: '#headRight', //(1st gen)
    methods: {
        onclick: function () {
            var logConf = confirm('ログアウトします。 \nよろしいですか？');
            if (logConf == true) {
                location.href = 'logout';
            } else {
                return false;
            }
        }
    }
})
// #############################################################################


// 1st gen（一番上のコンポーネント)####################################
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)
Vue.component('paginate', VuejsPaginate)


var items = [];
for (var i = 1; i <= 105; i++) {
    items.push('item-' + i);
}

const main = new Vue({
    el: 'main',
    data: {
        result: [],
        name2: '',
        name1: '',
        kana2: '',
        kana1: '',
        email: '',
        typ: '',
        deleteId: [],
        deleteData: '',
        countDelete: '',
        editData:'',
        editId:'',
        editContent:false,
        //     //paginate用         
        parPage: 10, //paginate用 
        currentPage: 1, //paginate用 
        getCount: '', //件数取得
        display: false, //初期表示用
        showContent: false, //モーダル表示用
        editShowContent: false, //モーダル表示用
        deleteButton: false, //削除ボタン用
        hiddenId: [],
    },

    methods: {
        allUsers: function () {
            axios.post('/api/allUsers').then((res) => {
                this.result = res.data
            });
        },

        // http://wordpress.ideacompo.com/?p=14807
        // https://codeday.me/jp/qa/20190731/1348550.html
        searchUser: function () {
            var form = new FormData();

            form.append('name2', this.name2);
            form.append('name1', this.name1);
            form.append('kana2', this.kana2);
            form.append('kana1', this.kana1);
            form.append('email', this.email);
            form.append('typ', this.typ);

            // getで受け取ったデータの形式がJSONだと、自動的にオブジェクトに変換して渡してくれる
            axios.post('/api/searchUser', form).then((res) => {
                this.result = res.data;
                this.getCount = Object.keys(this.result).length;

                if (this.getCount == 0) {
                    alert('該当するデータはありません。\n別のキーワードで検索してください。')
                }
            });



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
        
        getEditId: function(e){
            this.editId = e.target.value;
            this.editModal();
        },
        editModal:function(){
            this.editShowContent = true
            this.editData = this.result.filter(x => this.editId.includes(x.id));
        },

        deleteModal: function () {
            this.showContent = true

            // https://qiita.com/hirakuma/items/fd7b6492939951190496
            this.deleteData = this.result.filter(x => this.deleteId.includes(x.id));
            this.countDelete = Object.keys(this.deleteData).length;

        },
        closeModal: function () {
            this.showContent = false
            this.editShowContent = false
        },

        deleteEnd: function () {
            var params = new FormData();
            // https://readouble.com/laravel/6.x/ja/eloquent.html ソフトデリートを使うと管理が楽？ 今回は使わず
            // var arr = _.values(this.deleteId);
            params.append("id", this.deleteId);
        //    var delForm=JSON.stringify(arr);
            axios.post('/api/deleteUsers', params).then((res) => {
                alert('ユーザー情報を'+this.countDelete+'件削除しました。')
                this.showContent = false;
                this.deleteId=[];
                this.searchUser();
                
            }).catch((error) => {
                console.log(this.deleteId)
                console.log(delFormData)
                alert('false');
                console.log(error);
                this.showContent = false
            });

        },

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

    created: function () {
        if (this.getCount > 0) {
            this.display = true;
        } else {
            this.display = false;
        };

        if (this.deleteId == '') {
            this.deleteButton = false;
        } else {
            this.deleteButton = true;
        }
    },

    updated: function () {
        if (this.getCount > 0) {
            this.display = true;
        } else {
            this.display = false;
        }


    },
})
// ####################################################################
// モーダル管理########################################################
// https://reffect.co.jp/vue/understand-component-by-moda-window  とばすstopPropagation

Vue.component('delete-modal', {

    // props: ['deleteId'],

    template: `
      <div id="overlay">
          <div id="content">
          <p><slot></slot></p>
          <div class='deleteConf'>
          <button v-on:click="deleteEnd">削除</button>
          <button v-on:click="clickEvent">キャンセル</button>
          </div>
          </div>
      </div>
      `,

    methods: {
        clickEvent: function () {
            //↓親に渡す
            this.$emit('from-child')
        },

        deleteEnd: function () {
            this.$emit('delete-end')
        }
    }
}),

Vue.component('edit-modal', {
    template: `
      <div id="overlay-edit">
          <div id="content-edit">
          <p><slot></slot></p>
          <div class='editConf'>
          <button v-on:click="editEnd">編集</button>
          <button v-on:click="editEvent">キャンセル</button>
          </div>
          </div>
      </div>
      `,

    methods: {
        editEvent: function () {
            //↓親に渡す
            this.$emit('from-child')
        },

        editEnd: function () {
            this.$emit('edit-end')
        }
    }
})
