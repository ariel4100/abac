<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Esaú Murillo',
            'username' => 'esaujose7',
            'admin_status' => '0',
            'email' => 'esaujose7@gmail.com',
            'password' => Hash::make('1510997'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Pablo Cabañuz',
            'username' => 'pablo',
            'admin_status' => '1',
            'email' => 'pcabanuz@osole.es',
            'password' => Hash::make('pablopablo'),
        ]);
    }
}
