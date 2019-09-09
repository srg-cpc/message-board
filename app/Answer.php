<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'body',
    ];

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

}
