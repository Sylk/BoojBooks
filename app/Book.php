<?php

namespace App;

use App\Http\Controllers\BookController;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\Tags\HasTags;

class Book extends Model
{
    use HasTags;

    protected $primaryKey = 'id';
    protected $foreignKey = 'book_id';
    public $incrementing = true;
    protected $fillable = ['title', 'author', 'edition', 'length', 'score', 'cover', 'file', 'published_date'];
    public $timestamps = false;

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'book_id', 'id');
    }
}
