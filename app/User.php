<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $role_id
 * @property int $status_id
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $image_name
 * @property int $confirm
 * @property UserRole $userRole
 * @property UserStatus $userStatus
 * @property Address $address
 * @property BookComment[] $bookComments
 * @property BookFactorUser[] $bookFactorUsers
 * @property Message[] $messages
 * @property News[] $news
 * @property NewsComment[] $newsComments
 * @property PersonalData $personalData
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'status_id', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'image_name', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRole()
    {
        return $this->belongsTo('App\Models\UserRole', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userStatus()
    {
        return $this->belongsTo('App\Models\UserStatus', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookComments()
    {
        return $this->hasMany('App\Models\BookComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookFactorUsers()
    {
        return $this->hasMany('App\Models\BookFactorUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsComments()
    {
        return $this->hasMany('App\Models\NewsComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personalData()
    {
        return $this->hasOne('App\Models\PersonalData', 'user_id');
    }
}
