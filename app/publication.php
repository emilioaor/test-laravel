<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    protected $table = 'publications';

    protected $fillable = ['title','publication','author'];

    public function categories(){

    	return $this->belongsToMany('App\category','publications_categories','publication_id','category_id');
    }

    public function comments(){

    	return $this->hasMany('App\comment','publication_id');
    }
}
