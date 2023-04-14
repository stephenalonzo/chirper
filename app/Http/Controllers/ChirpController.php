<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\ChirpUser;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Rechirp;
use App\Models\User;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    // Return index
    public function index()
    {

        $follows     = Follow::where('user_id_1', auth()->user()->id)->get();

        if (count($follows) > 0)
        {

            return view('index', [
                'chirps'    => Chirp::all(),
                'likes'     => Like::all(),
                'rechirps'  => Rechirp::all(),
                'follows'   => Follow::all(),
                'users'     => User::all()
            ]);

        } else {

            $user = User::find(auth()->user()->id);
            
            return view('index', [
                'chirps'    => $user->chirps,
                'likes'     => Like::all(),
                'rechirps'  => Rechirp::all(),
                'follows'   => Follow::all(),
                'users'     => User::all()
            ]);

        }
        
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
