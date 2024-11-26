<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        DB::table('users')->insert(
            [
                'firstName' => 'دانیال ',
                'lastName' => 'دانیال رومیانی',
                'email' => 'daniyal_roomiyani@yahoo.com',
                'password' =>'$2y$12$7PkuFKThjOM5pzZwaHja9e9CWm8iMwnvfrS42ecEqVnqXyMO66WWq',
//                'admin' =>true,
//                'image' =>'profile.png',
            ]
        );
    }
}
