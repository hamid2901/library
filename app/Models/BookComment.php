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
 * @property BookComment $bookComment
 * @property BookCommentUser[] $bookCommentUsers
 */
class BookComment extends Model
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
        return url('/admin/book-comments/'.$this->getKey());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookComment()
    {
        return $this->belongsTo('App\Models\BookComment', 'reply_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookCommentUsers()
    {
        return $this->hasMany('App\Models\BookCommentUser', 'comment_id');
    }
}
