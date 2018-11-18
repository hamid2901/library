<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_availability extends Model
{

    // protected $table = '';

    /**
     * Get the books for the availability.
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'availability_id');
    }

}
