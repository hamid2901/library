<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string $image_dir
 * @property string $create_at
 * @property string $update_at
 * @property int $confirm
 * @property User $user
 * @property NewsComment[] $newsComments
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content', 'image_dir', 'create_at', 'update_at', 'confirm'];

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
    public function newsComments()
    {
        return $this->hasMany('App\Models\NewsComment');
    }
}
