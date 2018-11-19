<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 25 ; $i++ ){
            DB::table('message')->insert([
                'user_id'=> $faker->numberBetween(1,20),
                'content'=> $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
                'email'=> $faker->email,
                'admin_id'=> $faker->numberBetween(1,2),
                'create_at'=> Carbon::now(),
        ]);
        }  
    }
}
