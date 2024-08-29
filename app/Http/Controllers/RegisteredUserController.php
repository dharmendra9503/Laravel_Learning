<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store() {
        //validate
        $validatedAttributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)->letters()->numbers(), 'confirmed']   // Confirmed means that the password_confirmation field must match the password field
        ]);

        //Create the user
        $user = User::create($validatedAttributes);

        //Login
        Auth::login($user);

        //Redirect
        return redirect('/jobs');
    }
}