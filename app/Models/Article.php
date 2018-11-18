<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // protected $table = '';
   
    /**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'article_category', 'article_id', 'category_id');
    }
     
    /**
     * The authors that belong to the article.
     */
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'article_author', 'article_id', 'author_id');
    }
}
