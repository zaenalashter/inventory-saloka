<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_storehouse extends Model
{
    protected $table = 'storehouse';
    protected $fillable = ['code','name', 'admin', 'location', 'created_at', 'updated_at'];
}
