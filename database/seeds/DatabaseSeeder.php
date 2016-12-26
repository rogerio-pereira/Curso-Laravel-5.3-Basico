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
        /*
            Modo não tão Correto correto é criar um seeder pelo artisan
         App\User::create([
                'name' => 'Rogério Eduardo Pereira',
                'email' => 'rogerio@colmeiatecnologia.com.br',
                'password' => bcrypt('bospe43bo');
            ]);*/

        $this->call(UserTableSeeder::class);
    }
}
