<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_usermenu extends Model
{
    protected $table = 'user_menu';
    protected $fillable = ['name', 'url', 'code', 'created_at', 'updated_at'];
}

