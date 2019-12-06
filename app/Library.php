<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    public function scopeKanaLike($query, $str){
        // where(対象のカラム, (検索条件), 検索文字列)
        return $query->where('kana', 'like', '%'.$str.'%');
    }
    public function scopeGenreLike($query, $str){
        return $query->where('library.genre', 'like', '%'.$str.'%');
    }
    public function scopePublLike($query, $str){
        return $query->where('library.publ', 'like', '%'.$str.'%');
    }
    public function scopeDisp($query){
        return $query->where('delet', false);
    }
}
