<?php

namespace App;

use App\Http\Controllers\BookController;
use Rutorika\Sortable\BelongsToSortedManyTrait;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
//    use BelongsToSortedManyTrait;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_collection')
            ->withPivot('book_collection')
            ->using(BookController::class);
//        return $this->belongsToSortedMany('App\Book');
    }

}
