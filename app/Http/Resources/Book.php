<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author ,
            'edition' => $this->edition ,
            'length' => $this->length ,
            'score' => $this->score ,
            'cover' => $this->cover ,
            'file' => $this->file ,
            'publishedDate' => $this->published_date ,
        ];
    }
}
