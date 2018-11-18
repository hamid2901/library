<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    // protected $table = '';

     /**
     * Get the personal_datas for the gender.
     */
    public function personal_datas()
    {
        return $this->hasMany('App\Models\Personal_data', 'gender_id');
    }

}
