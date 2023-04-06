<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\Rechirp;
use Illuminate\Http\Request;

class RechirpController extends Controller
{
    // Store rechirp
    public function store(Chirp $chirp)
    {

        Rechirp::create([
            'user_id'   => auth()->user()->id,
            'chirp_id'  => $chirp->id
        ]);

        return back();

    }

    // Destroy chirp
    public function destroy(Chirp $chirp)
    {

        Rechirp::where('chirp_id', $chirp->id)
        ->where('user_id', auth()->user()->id)
        ->delete();

        return back();

    }

}
