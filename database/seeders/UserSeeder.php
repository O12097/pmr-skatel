<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'id_user' => "1",
        //     'email' => "celi@gmail.com",
        //     'password' => Hash::make('111'),
        // ]);
        // DB::table('users')->insert([
        //     'id_user' => "2",
        //     'email' => "administrator@example.com",
        //     'password' => Hash::make('Pmr@skatel'),
        // ]);
        DB::table('users')->insert([
            'id_user' => "3",
            'email' => "tester@team.com",
            'password' => Hash::make('Pmr@skatel'),
        ]);
    }
}
