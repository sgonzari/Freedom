<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostUser extends Component
{
    public $user ;

    public function render() {
        $posts = [] ;

        $user = User::where('username', $this->user)->get() ;
        $userPosts = $user->first()->posts()->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }

        return view('components.post-user', compact("posts"));
    }
}
