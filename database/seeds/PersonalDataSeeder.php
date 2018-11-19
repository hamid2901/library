<?php

use Illuminate\Database\Seeder;
use App\User;

class PersonalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        foreach(range(1,20) as $index) {
            DB::table('personal_data')->insert([
                'user_id'=> $index,
                'first_name'=> $faker->firstNameMale,
                'last_name'=> $faker->lastName,
                'gender_id'=> $faker->numberBetween(1,2),
                'phone'=> $faker->e164PhoneNumber,
                'profession'=> $faker->jobTitle,
                'university'=> $faker->company,
                'birthday'=> $faker->unixTime(),
            ]);
        } 
    }
}
