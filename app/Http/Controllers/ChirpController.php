<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\ChirpUser;
use App\Models\Like;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    // Return index
    public function index()
    {

        return view('index', [
            'chirps'    => Chirp::all(),
            'likes'     => Like::all()
        ]);
        
    }

    // Store chirp
    public function store(Request $request)
    {

        $inputFields = $request->validate([
            'subject' => 'required|max:150'
        ]);

        $inputFields['name'] = auth()->user()->name;
        $inputFields['username'] = auth()->user()->username;

        $chirp = Chirp::create($inputFields);
        
        ChirpUser::create([
           'chirp_id'   => $chirp->id,
           'user_id'    => auth()->user()->id 
        ]);

        return redirect('/');

    }

    // Delete chirp
    public function destroy(Chirp $chirp)
    {

        $chirp->delete();

        return redirect('/');

    }

}
