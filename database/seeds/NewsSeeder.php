<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 25 ; $i++ ){
            DB::table('news')->insert([
                'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
                'content'=> $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                'image_dir'=> $faker->userName,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'user_id'=> $faker->numberBetween(1,2),
                'confirm'=> $faker->numberBetween(0,1),

        ]);
        }  
    }
}
