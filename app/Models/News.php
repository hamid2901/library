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
    protected $fillable = [
        "title",
        "content",
        "image_dir",
        "user_id",
        "confirm",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/news/'.$this->getKey());
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsComments()
    {
        return $this->hasMany('App\Models\NewsComment', 'news_id');
    }
}
