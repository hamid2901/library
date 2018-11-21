<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $alley
 * @property string $postal_code
 * @property int $plate
 * @property User $user
 */
class Address extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'address';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'state', 'city', 'street', 'alley', 'postal_code', 'plate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
