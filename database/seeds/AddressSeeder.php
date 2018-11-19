<?php

use Illuminate\Database\Seeder;
use App\User;
class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {

        foreach(range(1,20) as $index) {
            DB::table('address')->insert([
                'state'=> $faker->state,
                'city'=> $faker->city,
                'street'=> $faker->streetName,
                'alley'=> $faker->streetSuffix,
                'plate'=> $faker->buildingNumber,
                'postal_code'=> $faker->postcode,
                'user_id'=> $index,
        ]);
        } 
    }   
}