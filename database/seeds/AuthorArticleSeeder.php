<?php

use Illuminate\Database\Seeder;

class AuthorArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 30 ; $i++ ){
            DB::table('author_article')->insert([
                'article_id'=> $faker->numberBetween(1,20),
                'author_id'=> $faker->numberBetween(1,10),
        ]);
        }  
    }
}
