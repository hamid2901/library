<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_format extends Model
{
    // protected $table = '';
 
    /**
     * Get the book_details for the book_format.
     */
    public function book_details()
    {
        return $this->hasMany('App\Models\book_detail', 'format_id');
    }

}
