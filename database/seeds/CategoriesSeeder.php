<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('categories')->insert([
                
                [
                    'type' => 'ادبیات',
                ],
                [
                    'type' => 'جغرافیا و تاریخ',
                ],
                [
                    'type' => 'دین',
                ],
                [
                    'type' => 'زبان',
                ],
                [
                    'type' => 'علوم اجتماعی',
                ],
                [
                    'type' => 'علوم طبیعی و ریاضیات',
                ],
                [
                    'type' => 'علوم کاربردی',
                ],
                [
                    'type' => 'فلسفه و روانشناسی',
                ],
                [
                    'type' => 'کتب اصلی درسی و کمک درسی',
                ],
                [
                    'type' => 'کلیات',
                ],
                [
                    'type' => 'هنرها',
                ],
        ]);
    }
}
