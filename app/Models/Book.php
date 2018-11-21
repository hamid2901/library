<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $availability_id
 * @property string $title
 * @property string $image_dir
 * @property string $created_at
 * @property string $updated_at
 * @property string $isbn
 * @property BookAvailability $bookAvailability
 * @property Author[] $authors
 * @property Category[] $categories
 * @property BookComment[] $bookComments
 * @property BookDetail $bookDetail
 * @property BookFactorUser[] $bookFactorUsers
 */
class Book extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'book';

    /**
     * @var array
     */
    protected $fillable = ['availability_id', 'title', 'image_dir', 'created_at', 'updated_at', 'isbn'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookAvailability()
    {
        return $this->belongsTo('App\Models\BookAvailability', 'availability_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'book_author');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookComments()
    {
        return $this->hasMany('App\Models\BookComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookDetail()
    {
        return $this->hasOne('App\Models\BookDetail', 'book_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookFactorUsers()
    {
        return $this->hasMany('App\Models\BookFactorUser');
    }
}
