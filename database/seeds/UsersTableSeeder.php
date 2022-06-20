<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'name' => 'admin',
        		'name_login' => 'admin',
        		'email' => 'admin@gmail.com',
        		'password' => Hash::make('123456'),
                'role' => 2
        	],
        	[
        		'name' => 'mod',
                'name_login' => 'mod',
        		'email' => 'neunhuemlamay@gmail.com',
        		'password' => Hash::make('123456'),
                'role' => 1
        	],
            [
                'name' => 'mod1',
                'name_login' => 'mod1',
                'email' => 'clonebabi1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 1
            ],


        ];
        DB::table('users')->insert($users);
    }
}
