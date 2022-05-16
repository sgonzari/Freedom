<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    protected $listeners = ['render' => 'render'] ;

    public function render() {
        $posts = [] ;

        // Post de usuarios a los que sigue
        $followers = User::find(Auth::user()->id_user)->followings()->get() ;
        foreach ($followers as $follower) {
            foreach ($follower->posts()->get() as $followerPost) {
                array_push($posts, $followerPost) ;
            }
        }
        // Repost de usuarios a los que sigue
        foreach ($followers as $follower) {
            foreach ($follower->reposts()->get() as $followerPost) {
                array_push($posts, $followerPost) ;
            }
        }
        // Likes de usuarios a los que sigue
        foreach ($followers as $follower) {
            foreach ($follower->likes()->get() as $followerPost) {
                array_push($posts, $followerPost) ;
            }
        }

        // Posts propios
        $userPosts = User::find(Auth::user()->id_user)->posts()->orderBy('created_at')->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }
        
        usort($posts, function($x, $y) {
            return $x['created_at'] < $y['created_at'];
        });

        return view('components.home-component', compact('posts'));
    }
}
