<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_status extends Model
{
    // protected $table = '';
    
    /**
     * Get the users for the user_status.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'status_id');
    }

}
