<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'author_id',
        'title',
        'content',
        'read_number',
        'classification',
        'recycling',
        'create_time',
        'modify_time'
    ];
}
