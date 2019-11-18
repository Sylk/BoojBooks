<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Book;

class Tag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $taggedBooks = Book::withAnyTags([$this->name])->get();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'books' => $taggedBooks
        ];
    }
}
