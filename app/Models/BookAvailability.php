<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $status
 * @property Book[] $books
 */
class BookAvailability extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'book_availability';

    /**
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'availability_id');
    }
}
