<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = ['first_name',
    					   'middle_name',
    					   'last_name',
						   'email_address',
    					   'created_at',
    					   'confirmation_code',
    					   'confirmation_expired', 
    					   'updated_at'];

    protected $table = 'user';

    public function getId()
    {
      return $this->id;
    }

    public function isAdmin()
    {
        return $this->isAdmin; 
    }
}
