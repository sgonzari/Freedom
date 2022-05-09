<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render() {
        $posts = [] ;

        $followers = User::find(Auth::user()->id_user)->followings()->get() ;
        foreach ($followers as $follower) {
            foreach ($follower->posts()->get() as $followerPost) {
                array_push($posts, $followerPost) ;
            }
        }
        $userPosts = User::find(Auth::user()->id_user)->posts()->orderBy('created_at')->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }
        
        return view('components.home', compact('posts'));
    }
}
