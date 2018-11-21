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
    /**
     * @var array
     */
    protected $fillable = ['reply_to', 'content', 'created_at', 'updated_at', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsComment()
    {
        return $this->belongsTo('App\Models\NewsComment', 'reply_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentNewsUsers()
    {
        return $this->hasMany('App\Models\CommentNewsUser', 'comment_id');
    }
}
