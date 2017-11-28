<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parameter_detail extends Model
{
    protected $table = 'parameter_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product() {
      return $this->belongsTo('App\Product');
    }
}
