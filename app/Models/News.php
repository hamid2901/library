<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string $image_dir
 * @property string $created_at
 * @property string $updated_at
 * @property int $confirm
 * @property User $user
 * @property CommentNewsUser[] $commentNewsUsers
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content', 'image_dir', 'created_at', 'updated_at', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentNewsUsers()
    {
        return $this->hasMany('App\Models\CommentNewsUser');
    }
}
