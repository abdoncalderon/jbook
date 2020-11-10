<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('roles')->insert([
            'name' => 'SUPERUSER',
        ]);

        DB::table('users')->insert([
            'name' => 'SUPERUSER',
            'user' => 'superuser',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
            'role_id' => '1',
        ]);

        DB::table('projects')->insert([
            'name' => 'PROJECT EXAMPLE',
            'datestart' => now()->format('Y-m-d H:i:s'),
            'dateFinish' => now()->format('Y-m-d H:i:s'),
        ]);
        
    }
}
