<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserGenderSeeder::class);
        $this->call(AuthorRoleSeeder::class);
        $this->call(BookAvailabilitySeeder::class);
        $this->call(BookFormatSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(FactorSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(BookCommentsSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(NewsCommentsSeeder::class);
        $this->call(BookCategorySeeder::class);
        $this->call(ArtcileCategorySeeder::class);
        $this->call(BookAuthorSeeder::class);

        $this->call(ArticleAuthorSeeder::class);
        
        // $this->call(BookFactorUserSeeder::class);
        // $this->call(BookCommentUserSeeder::class);
        // $this->call(CommentNewsUserSeeder::class);

    }
}
