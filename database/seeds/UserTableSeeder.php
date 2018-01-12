<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'first_name'     => 'Angelo',
        'email_address'    => 'chris@scotch.io',
        'password' => Hash::make('awesome'),
    ));
}

}