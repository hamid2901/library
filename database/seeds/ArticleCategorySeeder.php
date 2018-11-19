<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category; 

class ArtcileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {

        $article_id = Article::pluck('id')->all();
        $category_id = Category::pluck('id')->all();

        for($i = 0 ; $i < 30  ; $i++ ){
            DB::table('article_category')->insert([
                'category_id'=> $faker->randomElement($category_id),
                'article_id'=> $faker->randomElement($article_id),
        ]);
        }   
    }
}
