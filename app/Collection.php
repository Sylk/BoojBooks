<?php

namespace App;

use Rutorika\Sortable\BelongsToSortedManyTrait;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use BelongsToSortedManyTrait;

    public function books()
    {
        return $this->belongsToSortedMany('App\Book');
    }

}
