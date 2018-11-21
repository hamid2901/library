<?php

use Illuminate\Database\Seeder;
use App\Models\BookComment;
use Carbon\Carbon;

class BookCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $reply_to = BookComment::pluck('id')->all();
        for($i = 0 ; $i < 100 ; $i++ ){
            DB::table('book_comments')->insert([
                'reply_to'=> $faker->randomElement($reply_to),
                'content'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'confirm'=> $faker->numberBetween(1,2),
        ]);
        }  
    }
}
