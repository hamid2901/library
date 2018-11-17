<?php

namespace App;

// morteza use follows. 
use Illuminate\Database\Eloquent\Model;


// 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //morteza write follows.

    /**
     * Get the personal_data record associated with the user.
     */
    public function personal_data()
    {
        return $this->hasOne('App\Personal_data', 'user_id');
    }

    
    /**
     * The books that belong to the User.
     */

    public function books()
    {
        return $this->belongsToMany('App\Book','book_factor_user', 'user_id', 'book_id');
    }

    
      /**
     * Get the user_roles record associated with the user.
     */
    public function user_roles()
    {
        return $this->belongsTo('App\User_role', 'role_id');
    }

    
      /**
     * Get the user_status record associated with the user.
     */
    public function user_status()
    {
        return $this->belongsTo('App\User_status', 'status_id');
    }

}
