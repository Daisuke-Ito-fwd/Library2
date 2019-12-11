// モーダル管理(コンポーネントの登録)########################################################
// https://reffect.co.jp/vue/understand-component-by-moda-window  とばすstopPropagation

//ローカル登録 タグを親コンポで定義する
//main components
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
          <div id="content-edit-conf">
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
    })


//books components

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
