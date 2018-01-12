<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user')->delete();
        // DB::table('user')->insert([
        //     'first_name' => str_random(10),
        //     'emsail_address' => 'test@gmail.com',
        //     'u_password' => bcrypt('secret'),
        //     'is_admin'   => '0',
        // ]);

        DB::table('user')->insert([
            'first_name' => str_random(10),
            'email_address' => 'testadmin@gmail.com',
            'password' => bcrypt('secret'),
            'isAdmin'   => '1',
        ]);
    }
}
