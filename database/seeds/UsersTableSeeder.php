<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'David Moreno Toribio',
            'email' => 'dmorenotoribio@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);        
        User::create([
        	'name' => 'Lucia Llacer Sanz',
            'email' => 'lllacersanz@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => false
        ]);
    }
}
