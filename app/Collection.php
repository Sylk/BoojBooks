<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $primaryKey = 'order';

    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class, 'book_id', 'book_id');
    }

    public function addBook($bookId)
    {
        try {
            $collection = new Collection;
            $collection->book_id = $bookId;
            $position = $this->lastPosition() + 1;
            $collection->order = $position;
            $collection->save();

            return $collection;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function removeBook($bookId)
    {
        try {
            $position = 0;
            foreach ($collection = Collection::orderby('order', 'ASC')->get() as $book) {
                if ($bookId == $book->book_id) {
                    $position = $book->order;
                    $book->delete();
                    foreach (Collection::orderby('order', 'ASC')->get() as $book) {
                        if ($book->order >= $position) {
                            if ($book->order != 0 && $position != 0) {
                                $book->order = $book->order - 1;
                                $book->save();
                                $position++;
                            }
                        }
                    }
                    return true;
                }
            }
            return false;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function lastPosition()
    {
        return Collection::count();
    }

    private function bookPosition($position)
    {
        return Collection::where('order', $position)->first();
    }

    public function sort($type, $origin, $destination)
    {
        switch ($type) {
            case('swap'):
                try {
                    $destinationBook = $this->bookPosition($destination);
                    $originBook = $this->bookPosition($origin);
                    $destinationBook->order = $originBook->order;
                    $originBook->order = $destination;
                    $destinationBook->save();
                    $originBook->save();

                    return true;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    return false;
                }
        }

        return true;
    }
}
