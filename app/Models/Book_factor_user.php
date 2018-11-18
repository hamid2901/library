<?php

namespace App\Models;


// morteza use follows. 
use Illuminate\Database\Eloquent\Model;
// 

use Illuminate\Database\Eloquent\Pivot;

class Book_factor_user extends Pivot
{
    // protected $table = '';

    
      /**
     * Get the factor record associated with the book_factor_user.
     */
    public function factor()
    {
        return $this->belongsTo('App\Models\Factor', 'factor_id');
    }

}
