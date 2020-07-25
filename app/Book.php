<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id', 'updated_at', 'created_at',];
    protected $table = 'daftar_buku';
}
