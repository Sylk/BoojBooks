<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Books extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'title' => $this->title ,
        'author' => $this->author ,
        'edition' => $this->edition ,
        'length' => $this->length ,
        'score' => $this->score ,
        'cover' => $this->cover ,
        'file' => $this->file ,
        'releaseDate' => $this->releaseDate ,
    ];
    }
}
