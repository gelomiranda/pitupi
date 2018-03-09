<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{
    protected $fillable = ['fullname',
    					   'mobileno',
    					   'updated_at'];

    protected $table = 'client';
}
