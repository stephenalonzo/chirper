<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    // Store like
    public function store(Chirp $chirp)
    {

        Like::create([
            'user_id'   => auth()->user()->id,
            'chirp_id'   => $chirp->id
        ]);

        return back();

    }

    // Destroy like
    public function destroy(Chirp $chirp)
    {

        Like::where('chirp_id', $chirp->id)
            ->where('user_id', auth()->user()->id)
            ->delete();

        return back();

    }

}
