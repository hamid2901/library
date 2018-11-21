<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $format
 * @property Book[] $books
 */
class BookFormat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'book_format';

    /**
     * @var array
     */
    protected $fillable = ['format'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'format_id');
    }
}
