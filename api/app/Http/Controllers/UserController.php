<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(10);
        return $users;
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}
