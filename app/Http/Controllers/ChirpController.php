<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chirp;
use App\Models\ChirpUser;
use App\Models\UserChirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    // Return index
    public function index()
    {

        return view('index', [
            'chirps'    => Chirp::all()
        ]);
        
    }

    // Store chirp
    public function store(Request $request)
    {

        $inputFields = $request->validate([
            'subject' => 'required|max:150'
        ]);

        $inputFields['user_id'] = auth()->user()->id;
        $inputFields['name'] = auth()->user()->name;
        $inputFields['username'] = auth()->user()->username;

        Chirp::create($inputFields);

        return redirect('/');

    }

}
