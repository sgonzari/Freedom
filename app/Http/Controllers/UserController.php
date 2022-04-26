<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home () {
        return view("home") ;
    }

    public function profile () {
        return view("profile") ;
    }

    public function user ($user) {
        return view("user", [
            "user" => $user
        ]) ;
    }
}
