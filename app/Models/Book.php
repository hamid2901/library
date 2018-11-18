<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // protected $table = '';

     /**
     * Get the book_detail record associated with the book.
     */
    public function book_detail()
    {
        return $this->hasOne('App\Models\Book_detail', 'book_id');
    }


     /**
     * Get the book_availability record associated with the book.
     */
    public function Book_availability()
    {
        return $this->belongsTo('App\Models\Book_availability', 'availability_id');
    }

    /**
     * The users that belong to the book.
     */

    public function users()
    {
        return $this->belongsToMany('App\User','book_factor_user', 'book_id', 'user_id');
    }

     /**
     * The categories that belong to the book.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'book_category', 'book_id', 'category_id');
    }
      
    /**
     * The authors that belong to the book.
     */
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'author_book', 'book_id', 'author_id');
    }

    /**
     * Get the book_comments for the book.
     */
    public function book_comments()
    {
        return $this->hasMany('App\Models\Book_comment', 'book_id');
    }
}
