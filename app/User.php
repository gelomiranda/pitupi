<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = ['user_email',
    					   'user_password',
    					   'user_type',
                           'user_link_validation',
    					   'updated_at'];

    protected $table = 'user';
    
    protected $primaryKey = 'user_id';
    public function getId()
    {
      return $this->user_id;
    }

    public function isAdmin()
    {
        if($this->user_type == 1){
            return true;
        }
    }


    public function isBorrower()
    {
        if($this->user_type == 2){
            return true;
        }
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->user_password;
    }

}
