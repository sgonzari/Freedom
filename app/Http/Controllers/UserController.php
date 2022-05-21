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

    public function profile (string $username) {
        $user = User::where('username', $username)->first() ;

        return view("profile", [
            "user" => $user,
            "option" => "posts"
        ]) ;
    }
    public function profileReposts (string $username) {
        $user = User::where('username', $username)->first() ;

        return view("profile", [
            "user" => $user,
            "option" => "reposts"
        ]) ;
    }
    public function profileLikes (string $username) {
        $user = User::where('username', $username)->first() ;

        return view("profile", [
            "user" => $user,
            "option" => "likes"
        ]) ;
    }

    public function post (string $username, int $id_post) {
        $user = User::where('username', $username)->withTrashed()->first() ;
        $post = $user->posts()->withTrashed()->find($id_post) ;

        return view("post", [
            "user" => $user,
            "post" => $post
        ]) ;
    }
}
