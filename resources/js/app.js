require('./bootstrap');
require('./jquery')

// ###########################################

// ユーザー検索ページ
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
// ####################################################################
// モーダル管理(コンポーネントの登録)########################################################
// https://reffect.co.jp/vue/understand-component-by-moda-window  とばすstopPropagation

//ローカル登録 タグを親コンポで定義する
var deleteModal = {
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

//グローバル登録 タグを子コンポで定義する。どこからでも使える
Vue.component('edit-modal', {
        template: `
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
    }),


    Vue.component('edit-conf-modal', {
        template: `
      <div id="overlay-edit">
          <div id="content-edit">
          <p><slot></slot></p>
          <div class='editConf'>
          <button v-on:click="update">登録</button>
          <button v-on:click="reEdit">編集</button>
          </div>
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
    })

// 1st gen（一番上のコンポーネント)####################################
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)
Vue.component('paginate', VuejsPaginate)
require('./addBook');


var items = [];
for (var i = 1; i <= 105; i++) {
    items.push('item-' + i);
}

const main = new Vue({
    el: '#main',
    data: {
        // main
        result: [],
        name2: '',
        name1: '',
        kana2: '',
        kana1: '',
        email: '',
        typ: '',
        errorMsg: '',
        // delete
        deleteId: [],
        deleteData: '',
        countDelete: '',
        // edit
        editData: '',
        editId: '',
        editContent: false,
        editConf: '',
        editName2: '',
        editName1: '',
        editKana2: '',
        editKana1: '',
        editEmail: '',
        //     //paginate用         
        parPage: 10, //paginate用 
        currentPage: 1, //paginate用 
        getCount: '', //件数取得
        display: false, //初期表示用
        // show
        showContent: false, //モーダル表示用delete
        editShowContent: false, //モーダル表示用edit
        editConfShowContent: false, //モーダル表示用editConf
        deleteButton: false, //削除ボタン用
        hiddenId: [],
        mainSwitch: false,

        // sort
        desc: false,
        sortName: '▼',
        sortKana: '▼',
        sortTyp: '▼',
        sortEmail: '▼',
        sortDate: '▼',
        whatCheck: '',

        //loading
        loading: true,
        clickLoading: true,
    },

    components: {
        'delete-modal': deleteModal
    },



    methods: {
        doAjax: function () {
            let self = this;
            self.isLoading = true;
            setTimeout(function () {
                self.isLoading = false;
                console.log('load off');
            }, 750);
        },

        checkSort: function (key) {



            // ソートのキーを取得
            this.whatCheck = key;
            // 矢印の制御、昇降切り替え

            if (this.whatCheck == 'typ') {
                if (this.desc == false) {
                    this.desc = true;
                    this.sortTyp = '▲';

                    this.result.sort(function (a, b) {
                        if (a.typ < b.typ) return -1;
                        if (a.typ > b.typ) return 1;
                        return 0;

                    })
                } else {
                    this.desc = false;
                    this.sortTyp = '▼';
                    this.result.sort(function (a, b) {
                        if (a.typ > b.typ) return -1;
                        if (a.typ < b.typ) return 1;
                        return 0;
                    })
                }
            } else if (this.whatCheck == 'name') {
                if (this.desc == false) {
                    this.desc = true;
                    this.sortName = '▲';
                    this.result.sort(function (a, b) {
                        if (a.name2 < b.name2) return -1;
                        if (a.name2 > b.name2) return 1;
                        if (a.name1 < b.name1) return -1;
                        if (a.name1 > b.name1) return 1;
                        return 0;

                    })
                } else {
                    this.desc = false;
                    this.sortName = '▼';
                    this.result.sort(function (a, b) {
                        if (a.name2 > b.name2) return -1;
                        if (a.name2 < b.name2) return 1;
                        if (a.name1 > b.name1) return -1;
                        if (a.name1 < b.name1) return 1;
                        return 0;
                    })
                }
            } else if (this.whatCheck == 'kana') {
                if (this.desc == false) {
                    this.desc = true;
                    this.sortKana = '▲';
                    this.result.sort(function (a, b) {
                        if (a.kana2 < b.kana1) return -1;
                        if (a.kana2 > b.kana1) return 1;
                        if (a.kana1 < b.kana1) return -1;
                        if (a.kana1 > b.kana1) return 1;
                        return 0;
                    })
                } else {
                    this.desc = false;
                    this.sortKana = '▼';
                    this.result.sort(function (a, b) {
                        if (a.kana2 > b.kana2) return -1;
                        if (a.kana2 < b.kana2) return 1;
                        if (a.kana1 > b.kana1) return -1;
                        if (a.kana1 < b.kana1) return 1;
                        return 0;
                    })
                }
            } else if (this.whatCheck == 'email') {
                if (this.desc == false) {
                    this.desc = true;
                    this.sortEmail = '▲';
                    this.result.sort(function (a, b) {
                        if (a.email < b.email) return -1;
                        if (a.email > b.email) return 1;
                        return 0;
                    })

                } else {
                    this.desc = false;
                    this.sortEmail = '▼';
                    this.result.sort(function (a, b) {
                        if (a.email > b.email) return -1;
                        if (a.email < b.email) return 1;
                        return 0;
                    })
                }
            } else if (this.whatCheck == 'date') {
                if (this.desc == false) {
                    this.desc = true;
                    this.sortDate = '▲';
                    this.result.sort(function (a, b) {
                        if (a.created_at < b.created_at) return -1;
                        if (a.created_at > b.created_at) return 1;
                        return 0;

                    })
                } else {
                    this.desc = false;
                    this.sortDate = '▼';
                    this.result.sort(function (a, b) {
                        if (a.created_at > b.created_at) return -1;
                        if (a.created_at < b.created_at) return 1;
                        return 0;
                    })
                }
            }
        },

        // http://wordpress.ideacompo.com/?p=14807
        // https://codeday.me/jp/qa/20190731/1348550.html
        searchUser: function () {
            if (this.kana2.match(/^[ァ-ヶー　]*$/) || this.kana1.match(/^[ァ-ヶー　]+$/)) {
                this.errorMsg = "";

                this.loadingOn();

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
                    this.currentPage = 1;
                    if (this.getCount == 0) {
                        alert('該当するデータはありません。\n別のキーワードで検索してください。')
                    }
                });

            } else {
                this.errorMsg = "フリガナは全角カタカナで入力してください。";
            }
        },

        loadingOn: function () {
            this.clickLoading = true;


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

        getEditId: function (e) {
            this.editId = e.target.value;
            this.editModal();
        },
        editModal: function () {
            this.editData = this.result.filter(x => x.id == this.editId);
            this.editName2 = this.editData[0]['name2'];
            this.editName1 = this.editData[0]['name1'];
            this.editKana2 = this.editData[0]['kana2'];
            this.editKana1 = this.editData[0]['kana1'];
            this.editEmail = this.editData[0]['email'];
            this.editShowContent = true

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
            this.editConfShowContent = false
        },

        deleteEnd: function () {
            var params = new FormData();
            // https://readouble.com/laravel/6.x/ja/eloquent.html ソフトデリートを使うと管理が楽？ 今回は使わず
            // var arr = _.values(this.deleteId);
            params.append("id", this.deleteId);
            //    var delForm=JSON.stringify(arr);
            axios.post('/api/deleteUsers', params).then((res) => {
                alert('ユーザー情報を' + this.countDelete + '件削除しました。')
                this.showContent = false;
                this.deleteId = [];
                this.searchUser();

            }).catch((error) => {
                console.log(this.deleteId)
                console.log(delFormData)
                alert('false');
                console.log(error);
                this.showContent = false
            });

        },

        showEditConf: function () {
            var form = new FormData();
            form.append('id', this.editId);
            form.append('name2', this.editName2);
            form.append('name1', this.editName1);
            form.append('kana2', this.editKana2);
            form.append('kana1', this.editKana1);
            form.append('email', this.editEmail);
            this.editConf = form;
            this.closeModal();
            this.editConfShowContent = true;

        },

        updateUser: function () {
            axios.post('/api/updateUser', this.editConf).then((res) => {
                alert('ユーザー情報を更新しました。');
                this.closeModal();
                this.searchUser();
            }).catch((error) => {
                alert('false');
                console.log(error);
                this.closeModal();
                this.searchUser();
            });
        },

        reEdit: function () {
            this.closeModal();
            this.editShowContent = true;
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

        this.doAjax();
        this.mainSwitch = true;
    },

    updated: function () {
        if (this.getCount > 0) {
            this.display = true;
        } else {
            this.display = false;
        }


    },

    mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 300);
    }



});
