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
            [
                'name' => 'user1',
                'name_login' => 'user1',
                'email' => 'clonebabi0@gmail.com',
                'password' => Hash::make('1'),
                'role' => 0
            ],
            [
                'name' => 'user2',
                'name_login' => 'user2',
                'email' => 'clonebabi2@gmail.com',
                'password' => Hash::make('2'),
                'role' => 0
            ],
            [
                'name' => 'user3',
                'name_login' => 'user3',
                'email' => 'clonebabi3@gmail.com',
                'password' => Hash::make('3'),
                'role' => 0
            ],
            [
                'name' => 'user4',
                'name_login' => 'user4',
                'email' => 'clonebabi4@gmail.com',
                'password' => Hash::make('4'),
                'role' => 0
            ]


        ];
        DB::table('users')->insert($users);
    }
}
