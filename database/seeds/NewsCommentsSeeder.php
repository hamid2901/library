<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\NewsComment;

class NewsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $reply_to = NewsComment::pluck('id')->all();

        for($i = 0 ; $i < 50 ; $i++ ){
            DB::table('news_comments')->insert([
                'reply_to'=> $faker->randomElement($reply_to),
                'content'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'confirm'=> $faker->numberBetween(1,2),
                'user_id'=> $faker->numberBetween(1,20),
                'news_id'=> $faker->numberBetween(1,25),
        ]);
        }  
    }
}
