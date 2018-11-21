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
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'message';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'content', 'email', 'admin_id', 'create_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
