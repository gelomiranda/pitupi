<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
		protected $fillable = ['user_id',
							   'document_description',
	    					   'document_type',
	    					   ];
    protected $table = 'document';
}
