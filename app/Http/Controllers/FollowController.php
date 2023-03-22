<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use App\Models\FollowUser;
use App\Models\UserFollow;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    // Show followers
    public function followers(User $user)
    {

        return view('users.followers', [
            'user'      => $user,
            'followers' => Follow::where('user_id_2', $user->id)->get()
        ]);

    }

    // Show following
    public function following(User $user)
    {

        return view('users.following', [
            'user'      => $user,
            'following' => Follow::where('user_id_1', $user->id)->get()
        ]);

    }

    // Follow user
    public function store(User $user)
    {

        $inputFields['user_id'] = $user->id;

        Follow::create([
            'user_id_1' => auth()->user()->id,
            'user_id_1_name' => auth()->user()->name,
            'user_id_1_username' => auth()->user()->username,
            'user_id_2' => $user->id,
            'user_id_2_name' => $user->name,
            'user_id_2_username' => $user->username,
        ]);

        return redirect('/users/'.$user->id);

    }

    // Unfollow user
    public function destroy(User $user)
    {

        Follow::where('user_id_1', auth()->user()->id)
            ->where('user_id_2', $user->id)
            ->delete();

        return redirect('/users/'.$user->id);

    }
    
}
