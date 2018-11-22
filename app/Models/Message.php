<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property string $email
 * @property int $admin_id
 * @property string $create_at
 * @property User $user
 */
class Message extends Model
{
    protected $fillable = [
        "user_id",
        "content",
        "email",
        "admin_id",
        "create_at",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/messages/'.$this->getKey());
    }
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'message';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
