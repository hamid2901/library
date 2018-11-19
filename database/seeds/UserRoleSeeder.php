<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('user_role')->insert([
                
                [
                    'role' => 'admin',
                ],
                [
                    'role' => 'user',
                ],
                [
                    'role' => 'employee',
                ],
        ]);
    }
}
