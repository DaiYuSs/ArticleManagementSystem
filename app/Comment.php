<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $timestamps = false;
    //
    protected $fillable = [
        'content',
        'name',
        'articles_id',
        'create_time',
        'audit'
    ];
}
