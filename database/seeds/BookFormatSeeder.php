<?php

use Illuminate\Database\Seeder;

class BookFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('book_format')->insert([
                
                [
                    'format' => 'وزیری',
                ],
                [
                    'format' => 'پالتویی',
                ],
                [
                    'format' => 'خشتی',
                ],
                [
                    'format' => 'لوحی',
                ],
                [
                    'format' => 'جیبی',
                ],
                [
                    'format' => 'رقعی',
                ],
        ]);
    }
}
