<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Seeder\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id_user' => "1",
            'email' => "celi@gmail.com",
            'password' => Hash::make('111'),
            // 'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
