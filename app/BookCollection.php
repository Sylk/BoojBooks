<?php

namespace App;

use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;

class BookCollection extends Model
{
    use SortableTrait;

    protected $table = 'book_collection';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function buildSortQuery()
    {
        return static::query()->where('collection_id', $this->collection_id);
    }
}
