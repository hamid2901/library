<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $format
 * @property BookDetail[] $bookDetails
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
    public function bookDetails()
    {
        return $this->hasMany('App\Models\BookDetail', 'format_id');
    }
}
