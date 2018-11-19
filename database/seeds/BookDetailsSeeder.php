<?php

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;
use App\Models\Publisher;
use App\Models\Book_format;

class BookDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        // $book_id = Book::pluck('id')->all();
        $publisher_id = Publisher::pluck('id')->all();
        $format_id = Book_format::pluck('id')->all();
 
        foreach(range(1,100) as $index) {
            DB::table('book_details')->insert([
                'book_id'=> $index,
                'publisher_id'=> $faker->randomElement($publisher_id),
                'issue_date'=> Carbon::now(),
                'cover'=> $faker->numberBetween(1,10),
                'format_id'=> $faker->randomElement($format_id),
                'pages'=> $faker->numberBetween(30,1500),
                'weight'=> $faker->numberBetween(500,2500),
                'price'=> $faker->numberBetween(5000,1000000),
            ]);
        } 
    }
}
