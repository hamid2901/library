<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('gender')->insert([
                
                [
                    'sex' => 'Male',
                ],
                [
                    'sex' => 'Female',
                ],
        ]);
    }
}
