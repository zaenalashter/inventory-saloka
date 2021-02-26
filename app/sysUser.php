<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysUser extends Model
{
    protected $table = 'sys_user';
    protected $fillable = ['username','password','isDel'];
}
