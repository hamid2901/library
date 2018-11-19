<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookFactorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
    //     for($i = 0 ; $i < 20 ; $i++ ){
    //         DB::table('book_factor_user')->insert([
    //             'factor_id'=> $faker->numberBetween(1,3),
    //             'book_id'=> $faker->numberBetween(1,3),
    //             'user_id'=> $faker->numberBetween(1,3),
    //             'duration'=> Carbon::now(),
    //             'return_date'=> Carbon::now(),
    //     ]);
    //     }
    
    

    //     $book = App\Models\Book::all();
    //     $user = App\User::all();

    //     App\Models\Factor::all()->each(function ($factor) use ($author)  { 
    //         $book->authors()->attach(
    //         $author->random(rand(1, 10))->pluck('id')->toArray()
    //     ); 
    // });

    
    }
}
