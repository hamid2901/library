<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $book_id
 * @property int $publisher_id
 * @property int $format_id
 * @property string $description
 * @property string $issue_date
 * @property int $cover
 * @property int $pages
 * @property int $weight
 * @property int $price
 * @property Book $book
 * @property BookFormat $bookFormat
 * @property Publisher $publisher
 */
class BookDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['book_id', 'publisher_id', 'format_id', 'description', 'issue_date', 'cover', 'pages', 'weight', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
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
}
