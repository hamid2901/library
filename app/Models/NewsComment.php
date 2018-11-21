<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $news_id
 * @property int $reply_to
 * @property string $content
 * @property string $create_at
 * @property string $update_at
 * @property int $confirm
 * @property News $news
 * @property NewsComment $newsComment
 * @property User $user
 */
class NewsComment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'news_id', 'reply_to', 'content', 'create_at', 'update_at', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsComment()
    {
        return $this->belongsTo('App\Models\NewsComment', 'reply_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
