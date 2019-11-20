<?php

namespace App\Http\Requests;
use App\Http\Validators\ExtensionValidator;
use Illuminate\Foundation\Http\FormRequest;

class searchUserRequest extends FormRequest
{
    /**
     * 連想配列の形で作成。
     * @return array
     */
    public function rules()
    {
        return 
        [
            'kana2'    =>['nullable', 'regex:/^[ァ-ヾ]+$/u'],
            'kana1'    =>['nullable', 'regex:/^[ァ-ヾ]+$/u'],
            // 'mail'     =>['email'],
        ];
    }

    public function messages(){
        return 
        [
            'kana2.regex'         =>'セイ：全角カタカナで入力してください。',
            'kana1.regex'         =>'メイ：全角カタカナで入力してください。',
            // 'mail.email'          =>'メールアドレスの形式が不正です。',
        ];
    }
}
