<?php

namespace App;

use App\Http\Controllers\BookController;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\Tags\HasTags;

class Book extends Model
{
    use HasTags;

    protected $fillable = ['title', 'author', 'edition', 'length', 'score', 'cover', 'file', 'published_date'];
    public $timestamps = false;

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'book_collection')
            ->withPivot('book_collection')
            ->using(BookController::class);
//        return $this->belongsToMany('App\Collection', 'book_collection');
    }
}
