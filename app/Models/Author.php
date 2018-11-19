<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    
    protected $table = 'author';

      /**
     * Get the author_role record associated with the author.
     */
    public function author_role()
    {
        return $this->belongsTo('App\Models\Author_role', 'author_id');
    }


     /**
     * The books that belong to the author.
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'book_author', 'author_id', 'book_id');
    }
    
    /**
     * The articles that belong to the author.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'article_author', 'author_id', 'article_id');
    }
}
