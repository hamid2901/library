<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


/**
 * @property int $id
 * @property int $role_id
 * @property int $status_id
 * @property int $sex
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $image_name
 * @property int $confirm
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $profession
 * @property string $university
 * @property string $birthdate
 * @property string $city
 * @property string $street
 * @property int $plate
 * @property string $alley
 * @property string $postal_code
 * @property UserGender $userGender
 * @property UserRole $userRole
 * @property UserStatus $userStatus
 * @property BookComment[] $bookComments
 * @property BookFactorUser[] $bookFactorUsers
 * @property Message[] $messages
 * @property News[] $news
 * @property NewsComment[] $newsComments
 */
class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    /**
     * @var array
     */
    protected $fillable = ['role_id', 'status_id', 'sex', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'image_name', 'confirm', 'first_name', 'last_name', 'phone', 'profession', 'university', 'birthdate', 'city', 'street', 'plate', 'alley', 'postal_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userGender()
    {
        return $this->belongsTo('App\Models\UserGender', 'sex');
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookComments()
    {
        return $this->hasMany('App\Models\BookComment');
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

    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'book_factor_user');
    }

    public function factors()
    {
        return $this->belongsToMany('App\Models\Factor', 'book_factor_user');
    }
}
