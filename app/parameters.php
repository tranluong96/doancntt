<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parameters extends Model
{
    protected $table = 'parameters';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
