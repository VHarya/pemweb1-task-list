<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'confirm-password' => ['required'],
        ], [
            'confirm-password.required' => 'Confirm Password cannot be empty!'
        ]);

        if ($validatedData['password'] != $validatedData['confirm-password']) {
            return back()->withErrors([
                'password-not-match' => '"Password Field" and "Confirm Password Field" values does not match.'
            ]);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
