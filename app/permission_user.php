<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission_user extends Model
{
    protected $table = 'permission_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
