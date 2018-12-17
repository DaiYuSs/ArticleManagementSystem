<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles_classification extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'title',
        'serial',
        'create_time'
    ];
}
