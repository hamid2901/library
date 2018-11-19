<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 10 ; $i++ ){
            DB::table('author')->insert([
                'first_name'=> $faker->firstNameMale,
                'last_name'=> $faker->lastName,
                'role_id'=> $faker->numberBetween(1,2),
        ]);
        }   
    }
}
