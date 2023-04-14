<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    // Search users
    public function index()
    {

        return view('users.search', ['users' => User::latest()->filter(request(['search']))->get()]);

    }


}
