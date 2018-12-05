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
    protected $fillable = [
        "borrow_status",
        "quantity",
        "borrow_date",
        "reserve_date",
        "duration",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/factors/'.$this->getKey());
    }

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'factor';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'book_factor_user');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'book_factor_user');
    }
}
