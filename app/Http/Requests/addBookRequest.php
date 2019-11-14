<?php

namespace App\Http\Requests;
use App\Http\Validators\ExtensionValidator;
use Illuminate\Foundation\Http\FormRequest;

class addBookRequest extends FormRequest
{
    /**
     * 連想配列の形で作成。
     * @return array
     */
    public function rules()
    {
        return 
        [
            'title'     =>['required'],
            'kana'      =>['required', 'regex:/^[ァ-ヾ]+$/u'],
            'auth'      =>['required'],
            'publ'      =>['integer'],
            'genre'     =>['integer'],
            's_date'    =>['date'],
            'isbn'      =>['integer'],
            'stock'     =>['integer'],
        ];
    }

    public function messages(){
        return 
        [
            'title.required'  =>'タイトルを入力してください。',
            'kana.required'   =>'フリガナを入力してください。',
            'kana.regex'      =>'全角カタカナで入力してください。',
            'auth.required'   =>'著者を入力してください。',
            'publ'            =>'出版社を選択してください。',
            'genre'           =>'ジャンルを選択してください',
            'isbn.integer'    =>'ISBNは半角数字で入力してください。',
            'stock.integer'   =>'冊数は半角数字で入力してください。',
        ];
    }
}
