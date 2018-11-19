<?php

use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // for($i = 0 ; $i < 120; $i++ ){
        //     DB::table('author_book')->insert([
        //         'book_id'=> $faker->numberBetween(1,100),
        //         'author_id'=> $faker->numberBetween(1,10),
        // ]);
        // }  

        $author = App\Models\Author::all();
        
        App\Models\Book::all()->each(function ($book) use ($author) { 
            $book->authors()->attach(
            $author->random(rand(1, 10))->pluck('id')->toArray()
        ); 
    });
    }
}