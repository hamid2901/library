<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $availability_id
 * @property int $publisher_id
 * @property int $format_id
 * @property string $title
 * @property string $image_dir
 * @property string $created_at
 * @property string $updated_at
 * @property string $isbn
 * @property string $description
 * @property string $issue_date
 * @property int $cover
 * @property int $pages
 * @property int $weight
 * @property int $price
 * @property BookAvailability $bookAvailability
 * @property BookFormat $bookFormat
 * @property Publisher $publisher
 * @property Author[] $authors
 * @property Category[] $categories
 * @property BookCommentUser[] $bookCommentUsers
 * @property BookFactorUser[] $bookFactorUsers
 */
class Book extends Model
{

    protected $fillable = [
        "title",
        "availability_id",
        "image_dir",
        "isbn",
        "publisher_id",
        "description",
        "issue_date",
        "cover",
        "format_id",
        "pages",
        "weight",
        "price",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    
    protected $appends = ['resource_url'];


    public function getResourceUrlAttribute() {
        return url('/admin/books/'.$this->getKey());
    }

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'book';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookAvailability()
    {
        return $this->belongsTo('App\Models\BookAvailability', 'availability_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookFormat()
    {
        return $this->belongsTo('App\Models\BookFormat', 'format_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
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
    public function bookCommentUsers()
    {
        return $this->hasMany('App\Models\BookCommentUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookFactorUsers()
    {
        return $this->hasMany('App\Models\BookFactorUser');
    }
}
