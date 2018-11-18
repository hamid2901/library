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
        return $this->hasOne('App\Models\Personal_data', 'user_id');
    }

    
    /**
     * The books that belong to the User.
     */

    public function books()
    {
        return $this->belongsToMany('App\Models\Book','book_factor_user', 'user_id', 'book_id');
    }

    
      /**
     * Get the user_roles record associated with the user.
     */
    public function user_roles()
    {
        return $this->belongsTo('App\Models\User_role', 'role_id');
    }

    
      /**
     * Get the user_status record associated with the user.
     */
    public function user_status()
    {
        return $this->belongsTo('App\Models\User_status', 'status_id');
    }

     /**
     * Get the messages for the user.
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'user_id');
    }

     /**
     * Get the book_comments for the user.
     */
    public function book_comments()
    {
        return $this->hasMany('App\Models\Book_comment', 'user_id');
    }

     /**
     * Get the news_comments for the user.
     */
    public function news_comments()
    {
        return $this->hasMany('App\Models\News_comment', 'user_id');
    }

     /**
     * Get the news for the user.
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'user_id');
    }

       /**
     * Get the address record associated with the user.
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address', 'user_id');
    }

}
