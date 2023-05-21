<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [ 'id' => 1 ,'name' => 'Admin'],
            [ 'id' => 2 ,'name' => 'Project User']
        ]);
        DB::table('users')->insert([
            [ 
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'role_id' => '1',
                'password' => Hash::make('1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 
                'name' => 'Project',
                'email' => 'project@mail.com',
                'role_id' => '2',
                'password' => Hash::make('1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
