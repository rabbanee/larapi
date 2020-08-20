<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\MateriCollection;
use App\Http\Resources\User\MateriResource;
use App\Materi;
use App\User;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function show($id)
    {
        $materi = Materi::where('user_id', $id)->get();
        return new MateriCollection($materi);
    }
}
