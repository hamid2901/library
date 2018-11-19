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
        $categories = App\Models\Category::all();
        
        App\Models\Article::all()->each(function ($article) use ($categories) { 
            $article->categories()->attach(
            $categories->random(rand(1, 11))->pluck('id')->toArray()
        ); 
    });
    }
}
