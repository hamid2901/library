<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_comment extends Model
{
    // protected $table = '';
   
      /**
     * Get the news record associated with the news_comment.
     */
    public function news()
    {
        return $this->belongsTo('App\Models\News', 'news_id');
    }

    
      /**
     * Get the user record associated with the news_comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


   // public function parent()
    // {
    //     return $this->belongsTo('App\Models\News_comment', 'reply_to');
    // }

    // public function children()
    // {
    //     return $this->hasMany('App\Models\News_comment', 'reply_to');
    // }

}
