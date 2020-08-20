<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\User;
use App\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }
}
