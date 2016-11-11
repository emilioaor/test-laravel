<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['comment','name','publication_id'];

    public function publication(){

    	return $this->belongsTo('App\publication','publication_id');
    }
}
