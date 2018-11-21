<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $borrow_status
 * @property int $quantity
 * @property string $borrow_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $reserve_date
 * @property string $duration
 * @property BookFactorUser[] $bookFactorUsers
 */
class Factor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'factor';

    /**
     * @var array
     */
    protected $fillable = ['borrow_status', 'quantity', 'borrow_date', 'created_at', 'updated_at', 'reserve_date', 'duration'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookFactorUsers()
    {
        return $this->hasMany('App\BookFactorUser');
    }
}
