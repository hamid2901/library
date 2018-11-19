<?php

use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 200 ; $i++ ){
            DB::table('book_category')->insert([
                'book_id'=> $faker->numberBetween(1,100),
                'category_id'=> $faker->numberBetween(1,11),
        ]);
        }  
    }
}
