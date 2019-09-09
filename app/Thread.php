<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
      'name',
      'body',
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
