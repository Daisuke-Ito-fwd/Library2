<?php

namespace App\Http\Requests;
use AppContact;
use App\User;
use App\Http\Validators\ExtensionValidator;
use Illuminate\Foundation\Http\FormRequest;

class addUserRequest extends FormRequest
{
    /**
     * このリクエストクラスを使うかどうか処理
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     if($this->path() == 'lib/addUserConf'){
    //         return true;
    //     }else{
    //         return true;
    //     }
    // }

    /**
     * 連想配列の形で作成。
     * @return array
     */
    public function rules()
    {
        return 
        [
            'typ'      =>['required'],
            'name2'    =>['required'],
            'name1'    =>['required'],
            'kana2'    =>['required', 'regex:/^[ァ-ヾ]+$/u'],
            'kana1'    =>['required', 'regex:/^[ァ-ヾ]+$/u'],
            'email'     =>['required', 'email', 'same:emailConf', 'unique:users,email'],
            'emailConf' =>['required'],
            'pass'     =>['required', 'alpha_num','between:8,100', 'same:passConf'],
            'passConf' =>['required'],
        ];
    }

    public function messages(){
        return 
        [
            'typ.required'        =>'アカウント種別を選択してください',
            'name2.required'      =>'姓：入力してください',
            'name1.required'      =>'名：入力してください',
            'kana2.required'      =>'セイ：入力してください',
            'kana2.regex'         =>'セイ：全角カタカナで入力してください。',
            'kana1.required'      =>'メイ：入力してください',
            'kana1.regex'         =>'メイ：全角カタカナで入力してください。',
            'email.required'       =>'メールアドレスを入力してください',
            'email.email'          =>'メールアドレスの形式が不正です。',
            'email.unique'         =>'このメールアドレスは既に登録されています。',
            'email.same'           =>'メールアドレスが一致しません。',
            'emailConf.required'   =>'確認用メールアドレスを入力してください',
            'pass.required'       =>'パスワードを入力してください',
            'pass.alpha_num'      =>'パスワードは半角英数字で入力してください。',
            'pass.between'        =>'パスワードは8桁以上の英数字で入力してください。',
            'pass.same'           =>'パスワードが一致しません。',
            'passConf.required'   =>'確認用パスワードを入力してください',
        ];
    }
}
