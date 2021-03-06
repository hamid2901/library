<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $reply_to
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property int $confirm
 * @property NewsComment $newsComment
 * @property CommentNewsUser[] $commentNewsUsers
 */
class NewsComment extends Model
{
    protected $fillable = [
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/news-comments/'.$this->getKey());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsComment()
    {
        return $this->belongsTo('App\Models\NewsComment', 'reply_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function news()
    {
        return $this->belongsTo('App\Models\News', 'news_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
