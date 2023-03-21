<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    // Follow user
    public function store(Request $request)
    {

        $inputFields['user_id'] = auth()->user()->id;
        $inputFields['follows'] = $request->user;
        
        Follow::create($inputFields);

        return redirect('/users/'.$request->user);

    }

    // Unfollow user
    public function destroy(User $user)
    {

        Follow::where('user_id', auth()->user()->id)->delete();

        return redirect('/users/'.$user->id);

    }
    
}
