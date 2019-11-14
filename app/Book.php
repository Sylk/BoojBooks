<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'edition', 'length', 'score', 'cover', 'file', 'published_date'];
    public $timestamps = false;
}
