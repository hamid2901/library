<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal_data extends Model
{
   
    // protected $table = '';

    /**
     * Get the user that owns the personal_data.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

      /**
     * Get the gender record associated with the personal_data.
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }



}
