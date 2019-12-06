<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActLog extends Model
{
    //
    protected $connection;

    const UPDATED_AT = null;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $connection = env('DB_LOG_CONNECTION', env('DB_CONNECTION', 'mysql'));
    }

    protected $fillable = [
        'user_id',
        'route',
        'url',
        'method',
        'status',
        'message',
        'remote_addr',
        'user_agent',
    ];

    protected $hidden = [
    ];
}

