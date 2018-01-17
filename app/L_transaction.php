<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class L_transaction extends Model
{
	protected $fillable = ['loan_transaction_id'];

    protected $table = 'loan_transaction';
}
