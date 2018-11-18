<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // protected $table = '';
  
    /**
     * Get the news_commetns for the news.
     */
    public function news_commetns()
    {
        return $this->hasMany('App\Models\News_comment', 'news_id');
    }

    /**
     * Get the user record associated with the news.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
