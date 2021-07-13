<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB; 

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i=0 ; $i < 90 ; $i++ ) { 
            $data = [ // các cột cần fake dữ liệu
                'name'=>$faker->name ,
               
                
            ];
            DB::table('categories')->insert($data); // tạo dữ liệu fake vào db
        }
    }
}
