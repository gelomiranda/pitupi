<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['user_id',
						   'profile_id',
    					   'profile_fullname',
    					   'profile_address',
    					   'profile_birthdate',
    					   'profile_current_employer',
    					   'profile_job_title',
    					   'profile_mobile_no',
    					   'profile_monthly_income',
    					   'profile_no_of_years',
    					   'profile_bank',
    					   'profile_bank_account',
    					   'updated_at',
    					   'created_at',
    					   'profile_id'];
    protected $table = 'profile';

    protected $primaryKey = 'profile_id';
}
