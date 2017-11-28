<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function category() {
      return $this->belongsTo('App\Category');
    }

    public function parameter_details(){
      return $this->hasMany('App\parameter_detail');
    }
}
