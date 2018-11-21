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
 
    $categories = App\Models\Category::all();
        
    App\Models\Book::all()->each(function ($book) use ($categories) { 
        $book->categories()->attach(
        $categories->random(rand(1, 11))->pluck('id')->toArray()
    ); 
});
    }
}
