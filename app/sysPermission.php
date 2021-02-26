<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysPermission extends Model
{
    protected $table = 'sys_permission';
    protected $fillable = ['username','id_menu'];
}
