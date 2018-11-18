<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_comment extends Model
{
    // protected $table = '';

    
    /**
     * Get the book record associated with the book_comment.
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

     /**
     * Get the user record associated with the book_comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    // public function parent()
    // {
    //     return $this->belongsTo('App\Models\Book_comment', 'reply_to');
    // }

    // public function children()
    // {
    //     return $this->hasMany('App\Models\Book_comment', 'reply_to');
    // }

}
