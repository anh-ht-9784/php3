<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = FakerFactory::create();
        for ($i=0 ; $i < 20 ; $i++ ) { 
            $data = [ // các cột cần fake dữ liệu
                'name'=>$faker->name ,
                'email'=>$faker->email ,
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ,
                'address'=>$faker->address ,
            ];
            DB::table('users')->insert($data); // tạo dữ liệu fake vào db
        }
    }
}
