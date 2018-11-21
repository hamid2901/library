<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $gender_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $profession
 * @property string $university
 * @property string $birthday
 * @property Gender $gender
 * @property User $user
 */
class PersonalData extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personal_data';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'gender_id', 'first_name', 'last_name', 'phone', 'profession', 'university', 'birthday'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
