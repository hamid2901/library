<?php

use Illuminate\Database\Seeder;

class UserGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('user_gender')->insert([
                
                [
                    'sex' => 'مرد',
                ],
                [
                    'sex' => 'زن',
                ],
        ]);
    }
}
