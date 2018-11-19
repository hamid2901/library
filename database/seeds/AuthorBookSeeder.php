<?php

use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 120; $i++ ){
            DB::table('author_book')->insert([
                'book_id'=> $faker->numberBetween(1,100),
                'author_id'=> $faker->numberBetween(1,10),
        ]);
        }  
    }
}
