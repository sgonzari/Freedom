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
            "user" => $user
        ]) ;
    }

    public function post (string $username, int $id_post) {
        $user = User::where('username', $username)->first() ;
        if (!is_null($user)) {
            $post = $user->posts()->find($id_post) ;
            if (!is_null($post)) {
                return view("post", [
                    "user" => $user,
                    "post" => $post
                ]) ;
            } else {
                $post = $user->posts()->withTrashed()->find($id_post) ;
                if (!is_null($post)) {
                    return view("post", [
                        "post" => $post
                    ]) ;
                } else {
                    return view("post") ;
                }
            }
        }
    }
}
