<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'postname',
        'user_id',
        'published_on'
    ];

    protected $dates = ['published_on'];

    public function setPublishedOnAttribute($date)
    {
        date_default_timezone_set("Asia/Kolkata"); 
        $this->attributes['published_on'] = Carbon::createFromFormat('Y-m-d',$date);
        //$this->attributes['published_on'] = Carbon::parse($date);
    
    }

    public function scopePublished($query)
    {
        date_default_timezone_set("Asia/Kolkata"); 
        $query->where('published_on', '<=', Carbon::now());
    }

     public function scopeUnPublished($query)
    {
        date_default_timezone_set("Asia/Kolkata"); 
        $query->where('published_on', '>', Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
