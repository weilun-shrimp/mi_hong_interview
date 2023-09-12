<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store()
    {
    }

    public function update()
    {
    }
}
