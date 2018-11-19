<?php

use Illuminate\Database\Seeder;

class AuthorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
            DB::table('author_role')->insert([
                
                [
                    'role' => 'نویسنده',
                ],
                [
                    'role' => 'مترجم',
                ],
        ]);
    }
}
