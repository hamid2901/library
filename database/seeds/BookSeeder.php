<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        factory(App\Models\Book::class, 20)->create();
    }
}
