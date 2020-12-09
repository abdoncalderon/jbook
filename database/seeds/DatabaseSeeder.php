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

        DB::table('contractors')->insert([
            'name' => 'MY ENTERPRISE',
        ]);

        DB::table('projects')->insert([
            'name' => 'PROJECT EXAMPLE',
            'datestart' => now()->format('Y-m-d H:i:s'),
            'dateFinish' => now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'SUPERUSER',
            'user' => 'superuser',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
            'role_id' => '1',
            'contractor_id' => '1',
        ]);

        DB::table('permits')->insert([
            'user_id' => '1',
            'create_folio' => '1',
            'create_dailyreport' => '1',
            'create_note' => '1',
            'create_comment' => '1',
            'print_dailyreport' => '1',
            'print_note' => '1',
            'print_folio' => '1',
            'edit_sequence' => '1',
        ]);
        
    }
}
