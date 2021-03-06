<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\Resource;

class PostCollection extends Resource
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

            'name'    => $this->title ,
            'details' => $this->body,
            'image'   => $this->image,
            'slug'    => $this->slug,
        ];
    }
}
