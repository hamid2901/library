<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    // protected $table = '';

    /**
     * Get the book_details for the Publisher.
     */
    public function book_details()
    {
        return $this->hasMany('App\Models\Book_detail', 'publisher_id');
    }
    
}
