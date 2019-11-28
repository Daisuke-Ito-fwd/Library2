<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'typ'      =>['required'],
            'name2'    =>['required'],
            'name1'    =>['required'],
            'kana2'    =>['required', 'regex:/^[ァ-ヾ]+$/u'],
            'kana1'    =>['required', 'regex:/^[ァ-ヾ]+$/u'],
            'email'     =>['required', 'email', 'same:mailConf'],
            'mailConf' =>['required'],
            'pass'     =>['nullable', 'alpha_num','between:8,100', 'same:passConf'],
            'passConf' =>['nullable'],
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
