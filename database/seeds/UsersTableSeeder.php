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
            
            'name' => 'Fernando Alves',
            'url'  => 'alves',
            'email' => 'fernando@gmail.com.br',
            'password' => bcrypt('123456'),
            'token'   => '12',
            'bibliografy' => 'fernando',
            
        ]);
    }
}
