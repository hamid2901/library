<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = '';

     /**
     * The books that belong to the category.
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'book_category', 'category_id', 'book_id');
    }
    
    /**
     * The articles that belong to the categry.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'article_category', 'category_id', 'article_id');
    }

}
