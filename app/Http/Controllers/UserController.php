<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use App\Models\Follower;
use App\Models\FollowUser;
use App\Models\UserFollow;
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

        return view('users.show', [
            'user'      => $user,
            'following' => Follow::where('user_id_1', $user->id)->get(),
            'followers' => Follow::where('user_id_2', $user->id)->get(),
            'follows'   => Follow::where('user_id_1', auth()->user()->id)->where('user_id_2', $user->id)->get()
        ]);

    }

    // Create user
    public function create()
    {

        return view('users.create');

    }

    // Create user
    public function edit(User $user)
    {

        if ($user->id != auth()->user()->id)
        {

            abort(403, 'Unauthorized Action');

        } else {

            return view('users.edit', [
                'user' => $user
            ]);

        }

    }

    // Store user
    public function register(Request $request)
    {

        $inputFields = $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => ['required', 'email'],
            'password'  => ['required', 'confirmed']
        ]);
        
        $inputFields['password'] = bcrypt($inputFields['password']);

        $user = User::create($inputFields);

        auth()->login($user);

        return redirect('/');

    }

    // Store changes
    public function update(Request $request, User $user)
    {

        if ($user->id != auth()->user()->id)
        {

            abort(403, 'Unauthorized Action');

        } else {

            $inputFields = $request->validate([
                'avatar'    => 'mimes:png,jpg'
            ]);

            if ($request->hasFile('avatar'))
            {

                $inputFields['avatar'] = $request->file('avatar')->store('avatars', 'public');

            }

            $user->update($inputFields);

            return redirect('/users/'.$user->id);

        }

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
