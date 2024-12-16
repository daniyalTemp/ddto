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
                'lastName' => ' رومیانی',
                'email' => 'daniyal_roomiyani@yahoo.com',
                'password' =>'$2y$12$7PkuFKThjOM5pzZwaHja9e9CWm8iMwnvfrS42ecEqVnqXyMO66WWq',
//                'admin' =>true,
//                'image' =>'profile.png',
            ]
        );

        DB::table('config')->insert(
            [
                'phone' => '-',
                'address' => '-',
                'telegram' => '-',
                'instagram' =>'-',
                'presents' =>json_encode([
                    '1'=>[
                        'name'=>'طراحی مدل‌های ترند و خاص',
                        'des'=>'-',
                        'pic'=>'ui-design.svg'
                    ],'2'=>[
                        'name'=>'چاپ ایده‌ها',
                        'des'=>'-',
                        'pic'=>'print.svg'
                    ],'3'=>[
                        'name'=>'تولید محصولات خاص ',
                        'des'=>'-',
                        'pic'=>'idea.svg'
                    ],'4'=>[
                        'name'=>'فروشگاه',
                        'des'=>'-',
                        'pic'=>'online-shop.svg'
                    ],'5'=>[
                        'name'=>'محتوای آموزشی ',
                        'des'=>'-',
                        'pic'=>'content-writing.svg'
                    ],'6'=>[
                        'name'=>'جنده بازی ( برای این ایده بدید ) ',
                        'des'=>'-',
                        'pic'=>'youtube.svg'
                    ],
                ]),
//                'admin' =>true,
//                'image' =>'profile.png',
            ]
        );
    }
}
