<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $fax
 * @property string $address
 * @property BookDetail[] $bookDetails
 */
class Publisher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'fax', 'address'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookDetails()
    {
        return $this->hasMany('App\Models\BookDetail');
    }
}
