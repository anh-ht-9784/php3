<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB; 
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i=0 ; $i < 20 ; $i++ ) { 
            $data = [ // các cột cần fake dữ liệu
                'name'=>$faker->name ,
                'price'=>$faker->randomDigit  ,
                'image'=>$faker->image ,
                'category_id'=>$faker->numberBetween($min = 4, $max = 20),
                'quantity'=>$faker->randomDigit  ,
            ];
            DB::table('products')->insert($data); // tạo dữ liệu fake vào db
        }
    }
}
