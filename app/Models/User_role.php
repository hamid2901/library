<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    // protected $table = '';

     /**
     * Get the users for the user_role.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id');
    }

}
