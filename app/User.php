<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotificationJp;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name2', 'name1','kana2', 'kana1',  'email', 'password', 'typ', 'disp_flag' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // scope ##############################################################################
//                                         ↓$strにコントローラの($request->xxxxx)が入る
    public function scopeKana2like($query, $str){
                    // where(対象のカラム, (検索条件), 検索文字列)
        return $query->where('kana2', 'like', '%'.$str.'%');
    }
    public function scopeKana1like($query, $str){
        return $query->where('kana1', 'like', '%'.$str.'%');
    }
    public function scopeName2like($query, $str){
        return $query->where('name2', 'like', '%'.$str.'%');
    }
    public function scopeName1like($query, $str){
        return $query->where('name1', 'like', '%'.$str.'%');
    }
    public function scopeMaillike($query, $str){
        return $query->where('email', 'like', '%'.$str.'%');
    }
    public function scopeTyp($query, $str){
        return $query->where('users.typ', 'like', '%'.$str.'%');
    }
    public function scopeDisp($query){
        return $query->where('disp_flag', false);
    }
// scope ##############################################################################

    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPasswordNotificationJp($token));
    }
}
