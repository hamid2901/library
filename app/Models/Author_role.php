<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author_role extends Model
{

    // protected $table = '';

    /**
     * Get the authors for the author_roll.
     */
    public function authors()
    {
        return $this->hasMany('App\Models\Author', 'author_id');
    }
}
