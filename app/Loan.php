<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
 	protected $fillable = ['user_id',
    					   'location',
    					   'updated_at'];
    					   
    protected $table = 'loan';
}
