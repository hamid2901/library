<?php

use Illuminate\Database\Seeder;

class BookAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('book_availability')->insert([
                
                [
                    'status' => 'در دسترس',
                ],
                [
                    'status' => 'خارج از دسترس',
                ],
                [
                    'status' => 'در دست امانت',
                ],
                [
                    'status' => 'رزرو شده',
                ],
        ]);
    }
}
