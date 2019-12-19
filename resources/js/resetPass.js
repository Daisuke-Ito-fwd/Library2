import Axios from "axios"
import { format } from "path"

new Vue({
    el:'#reset',
    data:{
        mailConf:       false,
        forResetEmail:  '',
        sendMail:       false,
        mailResult:'',
        ClearLoading:false,
    },

    methods: {
        checkEmail: function(){
            this.ClearLoading = true;
            var mail = new FormData;
            mail.append('email', this.forResetEmail);

            axios.post('/api/checkEmail', mail).then((res)=>{
                this.mailResult=res;
                if(this.mailResult['data'] == 0){
                    this.mailConf = true; //登録なし
                    this.sendMail = false;
                    console.log('nothing');
                }else{
                    axios.post('/password/email', mail).then((res)=>{
                        this.mailConf = false;
                        this.sendMail = true;
                        console.log('hit')
                    })
                        .catch(function(error){ alert('false');
                    });
                }
            });

            setTimeout(() => {
                this.ClearLoading = false;
            }, 3000);
        }
        
    },
})


// C:\xampp\htdocs\Library2\vendor\laravel\framework\src\Illuminate\Foundation\Auth\SendsPasswordResetEmails.php