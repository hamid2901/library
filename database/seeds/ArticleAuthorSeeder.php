<?php

use Illuminate\Database\Seeder;

class ArticleAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // for($i = 0 ; $i < 30 ; $i++ ){
        //     DB::table('author_article')->insert([
        //         'article_id'=> $faker->numberBetween(1,20),
        //         'author_id'=> $faker->numberBetween(1,10),
        // ]);
        // }
        $author = App\Models\Author::all();
        
        App\Models\Article::all()->each(function ($article) use ($author) { 
            $article->authors()->attach(
            $author->random(rand(1, 10))->pluck('id')->toArray()
        ); 
    });  
    }
}
