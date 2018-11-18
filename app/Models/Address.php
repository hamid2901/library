<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    // protected $table = '';
    
      /**
     * Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



}
