<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['category'];

    public function publications(){

    	return $this->belongsToMany('App\publication','publications_categories','publication_id','category_id');
    }
}
