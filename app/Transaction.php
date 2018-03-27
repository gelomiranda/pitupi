<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
-Transaction type flag
    -1 = These are the approved loan 
    -2 = These are the payment
    -3 = These are the investment of the team member
*/

class Transaction extends Model
{
	protected $fillable = ['transaction_id',
    					   'client_id',
    					   'transaction_type',
    					   'amount',
    					   'transaction_date'];

    protected $table = 'transaction';

    public function client()
    {
        return $this->belongsTo('App\Client','IDsafd');
    }
}
