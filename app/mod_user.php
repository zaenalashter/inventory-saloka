<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_user extends Model
{
    protected $table = 'user_management' ;
    protected $fillable = ['name', 'email', 'password','role', 'created_at', 'updated_at'];
}
