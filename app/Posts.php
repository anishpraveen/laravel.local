<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'postname',
        'user_id',
        'published_on'
    ];
}
