<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
 * @property BookCommentUser[] $bookCommentUsers
 * @property BookFactorUser[] $bookFactorUsers
 * @property CommentNewsUser[] $commentNewsUsers
 * @property Message[] $messages
 * @property News[] $news
 */
class User extends Model  implements Authenticatable
{
    use AuthenticableTrait;
    use SoftDeletes;

    protected $fillable = [
        "email",
        "email_verified_at",
        "password",
        "image_name",
        "role_id",
        "status_id",
        "confirm",
        "first_name",
        "last_name",
        "phone",
        "profession",
        "university",
        "birthdate",
        "sex",
        "city",
        "street",
        "plate",
        "alley",
        "postal_code",
        "activated",
        "forbidden",
        "language",
    
    ];
    
    protected $hidden = [
        "password",
        "remember_token",
    
    ];
    
    protected $dates = [
        "email_verified_at",
        "created_at",
        "updated_at",
        "deleted_at",
    
    ];
    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute() {
        return url('/admin/users/'.$this->getKey());
    }

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
        return $this->hasMany('App\Models\BookComment', 'user_id');
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
    public function newsComments()
    {
        return $this->hasMany('App\Models\NewsComment', 'user_id');
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
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin'  => $user->role === 'admin', // bool
        ];
    }
}
