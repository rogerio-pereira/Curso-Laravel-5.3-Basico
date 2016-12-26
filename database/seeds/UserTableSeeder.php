<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rogério Eduardo Pereira',
            'email' => 'rogerio@colmeiatecnologia.com.br',
            'password' => bcrypt('bospe43bo')
        ]);
    }
}
