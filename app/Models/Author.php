<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $role_id
 * @property string $first_name
 * @property string $last_name
 * @property AuthorRole $authorRole
 * @property Article[] $articles
 * @property Book[] $books
 */
class Author extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'author';

    /**
     * @var array
     */
    protected $fillable = ['role_id', 'first_name', 'last_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function authorRole()
    {
        return $this->belongsTo('App\AuthorRole', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_author');
    }
}
