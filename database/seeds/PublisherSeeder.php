<?php

use Illuminate\Database\Seeder;
use Faker\Provider\de_AT\Company;
use Carbon\Carbon;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 5 ; $i++ ){
            DB::table('publishers')->insert([
                'name'=> $faker->company,
                'phone'=> $faker->e164PhoneNumber,
                'fax'=> $faker->e164PhoneNumber,
                'address'=> $faker->address,
        ]);
    }
    }
}