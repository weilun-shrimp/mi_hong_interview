<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('users.email', $request->email)->select('users.*')->first();
        if (!$user) return back()->withErrors(['email' => 'User not found.']);
        if (!\Hash::check($request->password, $user->password)) return back()->withErrors(['password' => 'Password not pass.']);
        \Auth::login($user);
        return redirect()->route('user.index');
    }
}
