<?php

namespace App\Http\Resources\User;

use App\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MateriCollection extends ResourceCollection
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
            'data' => [
                'name' => $this->collection->first()->user->name,
                'email' => $this->collection->first()->user->email,
            ],
            'materi' => MateriResource::collection($this->collection),
            'jumlah_materi' => $this->collection->count()
        ];
    }
}
