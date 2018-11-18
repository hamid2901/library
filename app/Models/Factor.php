<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    // protected $table = '';

    /**
     * The book_factor_users that belong to the factor.
     */

    public function book_factor_users()
    {
        return $this->hasMany('App\Models\Book_factor_user', 'factor_id');
    }

}
