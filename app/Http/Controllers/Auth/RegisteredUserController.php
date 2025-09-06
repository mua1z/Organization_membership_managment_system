<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
     public function create()
{
    $organizations = \App\Models\User::where('role', 'organAdmin')->get();
    return view('auth.register', compact('organizations'));
}
}
