<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_detail extends Model
{
    // protected $table = '';

      /**
     * Get the book that owns the book_detail.
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
    
      /**
     * Get the book_format record associated with the book_detail.
     */
    public function book_format()
    {
        return $this->belongsTo('App\Models\Book_format', 'format_id');
    }

    
      /**
     * Get the Publisher record associated with the book_detail.
     */
    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }


}
