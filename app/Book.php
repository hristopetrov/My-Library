<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','isbn','year','description', 'path',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
