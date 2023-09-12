<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        return back()->withErrors(['password' => 'password is required and length must greater than 5.']);
        if (!$request->password or strlen($request->password) < 5) return back()->withErrors(['password' => 'password is required and length must greater than 5.']);
        if (User::where('email', $request->email)->first()) return back()->withErrors(['email' => 'This email was used by other user.']);
        $user = new User;
        foreach (['name', 'email', 'role'] as $v) $user->{$v} = $request->{$v};
        $user->email_verified_at = (new \DateTime)->format('Y-m-d H:i:s');
        $user->password = \Hash::make($request->password);
        $user->save();
        return redirect(route('user.index'));
    }

    public function update(UserRequest $request, string $id)
    {
        if (!$user = User::where('id', $id)->first()) return back()->withErrors(['ID' => 'System can\'t find user.']);
        foreach (['name', 'email', 'role'] as $v) $user->{$v} = $request->{$v};
        $user->email_verified_at = (new \DateTime)->format('Y-m-d H:i:s');
        $user->save();
        return redirect(route('user.index'));
    }
}
