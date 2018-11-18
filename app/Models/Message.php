<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // protected $table = '';
     
    /**
     * Get the user record associated with the message.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
