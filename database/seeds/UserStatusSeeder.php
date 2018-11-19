<?php

use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('user_status')->insert([
                
                [
                    'status' => 'فعال',
                ],
                [
                    'status' => 'غیر فعال',
                ],
                [
                    'status' => 'بلاک',
                ],
                [
                    'status' => 'ریپورت',
                ],
        ]);
    }
}
