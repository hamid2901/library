<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $borrow_status
 * @property int $quantity
 * @property string $borrow_date
 * @property string $create_at
 * @property string $update_at
 * @property string $reserve_date
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
    protected $fillable = ['borrow_status', 'quantity', 'borrow_date', 'create_at', 'update_at', 'reserve_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookFactorUsers()
    {
        return $this->hasMany('App\Models\BookFactorUser');
    }
}
