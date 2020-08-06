<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Null_;

class StudentResource extends JsonResource
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
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'tempat' => $this->tempat_lahir,
            'jurusan' => $this->jurusan,
            'mendaftar' => $this->created_at !== Null ? $this->created_at->diffForHumans() : null,
        ];
    }
}
