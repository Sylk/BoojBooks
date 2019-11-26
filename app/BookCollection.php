<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class BookCollection extends Pivot implements Sortable
{
    use SortableTrait;

//    protected $table = 'book_collection';

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

//    public function buildSortQuery()
//    {
//        return static::query()->where('collection_id', $this->collection_id);
//    }
}
