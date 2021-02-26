<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sysUserProfile extends Model
{
    protected $table = 'sys_user_profile';
    protected $fillable = ['username','full_name','email','phone'];
}
