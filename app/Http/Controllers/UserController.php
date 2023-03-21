<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chirp;
use App\Models\Follow;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Return login index
    public function index()
    {

        return view('users.index');

    }

    // Create user
    public function show(User $user)
    {

        return view('show', [
            'user'      => $user,
            'chirps'    => Chirp::where('user_id', $user->id)->get(),
            'followers' => Follow::where('follows', $user->id)->get(),
            'following' => Follow::where('user_id', $user->id)->get()
        ]);

    }

    // Create user
    public function create()
    {

        return view('users.create');

    }

    // Log user in
    public function authenticate(Request $request)
    {

        $inputFields = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if (auth()->attempt($inputFields))
        {

            $request->session()->regenerate();
            
            return redirect('/');

        }

        return back()->withErrors(['username' => 'User does not exist'])->onlyInput('username');

    }

    // Log user out
    public function destroy()
    {

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');

    }

}
