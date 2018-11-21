<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $book_id
 * @property int $user_id
 * @property int $reply_to
 * @property string $content
 * @property string $create_at
 * @property string $update_at
 * @property int $confirm
 * @property Book $book
 * @property BookComment $bookComment
 * @property User $user
 */
class BookComment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['book_id', 'user_id', 'reply_to', 'content', 'create_at', 'update_at', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookComment()
    {
        return $this->belongsTo('App\Models\BookComment', 'reply_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
