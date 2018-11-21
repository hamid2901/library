<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $publish_date
 * @property string $description
 * @property string $article_filename
 * @property string $created_at
 * @property string $updated_at
 * @property int $confirm
 * @property Author[] $authors
 * @property Category[] $categories
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'article';

    /**
     * @var array
     */
    protected $fillable = ['title', 'publish_date', 'description', 'article_filename', 'created_at', 'updated_at', 'confirm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
