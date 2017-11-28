<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permission';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
