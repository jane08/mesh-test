<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Category as CategoryResource;

class Product extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return[
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'path' => $this->path,
            'categories' => $this->categories
           // 'categories' => CategoryResource::collection($this->categories)
        ];
    }
}
