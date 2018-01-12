<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = ['transaction_id',
    					   'user_id',
    					   'loan_id',
    					   'transaction_type',
    					   'amount',
    					   'transaction_date',
    					   'allocation_date',
    					   'approved_date',
    					   'approved_by',
    					   'approved_date'];

    protected $table = 'transaction';
}
