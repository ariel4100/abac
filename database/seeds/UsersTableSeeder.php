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
        DB::table('users')->insert([
            'name' => 'Esaú Murillo',
            'username' => 'esaujose7',
            'email' => 'esaujose7@gmail.com',
            'password' => Hash::make('1510997'),
            'nivel' => 's3'
        ]);
    }
}
