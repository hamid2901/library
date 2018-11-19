<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for($i = 0 ; $i < 10 ; $i++ ){
            DB::table('factor')->insert([
                'borrow_status'=> $faker->numberBetween(0,1),
                'quantity'=> $faker->numberBetween(1,5),
                'reserve_date'=> Carbon::now(),
                'borrow_date'=> Carbon::now(),
                'create_at'=> Carbon::now(),
                'update_at'=> Carbon::now(),
        ]);
        }   
    }
}
