<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mod_supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['code','name','phone', 'address', 'created_at', 'updated_at'];
}
