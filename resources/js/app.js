require('./bootstrap');
// ログアウト##################################################################
new Vue({
    el:'#headRight', //(1st gen)
    methods: {
        onclick: function(){
            var logConf=confirm('ログアウトします。 \nよろしいですか？');
            if(logConf == true){
            location.href='logout';
            }else{
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
for(var i=1; i<=105; i++){
  items.push('item-'+i);
}

const main = new Vue({
    el: 'main',
    data:{
        result: [],
        name2: '',
        name1: '',
        kana2: '',
        kana1: '',
        email: '',
        typ  : '',
        deleteId:[],
        // items: items,      //paginate用         
        parPage: 10,       //paginate用 
        currentPage: 1,     //paginate用 
        getCount:'',
    },

    methods:{
        allUsers: function(){
            axios.post('/api/allUsers').then((res)=>{this.result=res.data
            });
        },

        // http://wordpress.ideacompo.com/?p=14807
        // https://codeday.me/jp/qa/20190731/1348550.html
        searchUser: function(){
            var form = new FormData();
                
            form.append('name2', this.name2);
            form.append('name1', this.name1);
            form.append('kana2', this.kana2);
            form.append('kana1', this.kana1);
            form.append('email', this.email);
            form.append('typ', this.typ);

            // getで受け取ったデータの形式がJSONだと、自動的にオブジェクトに変換して渡してくれる
            axios.post('/api/searchUser', form).then((res)=>{
                this.result=res.data;
                this.getCount=Object.keys(this.result).length; 
            })
        },

        clickCallback: function(pageNum){
            this.currentPage = Number(pageNum);
        },

        resultCount: function(){
            this.getCount=Object.keys(this.result).length;
        }

    },



    computed: {
        // ↓ここで結果を切り出し,変数として返しているのでblade側のv-forの値をこの変数名に変える。
        getItems: function(){
            let current = this.currentPage * this.parPage;
            let start = current - this.parPage;
            // return this.items.slice(start, current);
            return this.result.slice(start, current);
        },
        getPageCount: function(){
            // return Math.ceil(this.items.length / this.parPage);
            return Math.ceil(this.result.length / this.parPage);
        }
    },

    created(){
        resultCount();
    },
})
// ####################################################################
