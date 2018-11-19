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
        // for($i = 0 ; $i < 200 ; $i++ ){
        //     DB::table('book_category')->insert([
        //         'book_id'=> $faker->numberBetween(1,100),
        //         'category_id'=> $faker->numberBetween(1,11),
        // ]);
        // }  

 
    $categories = App\Models\Category::all();
        
    App\Models\Book::all()->each(function ($book) use ($categories) { 
        $book->categories()->attach(
        $categories->random(rand(1, 11))->pluck('id')->toArray()
    ); 
});
    }
}
