<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public $loadAmount = 10 ;

    protected $listeners = ['render' => 'render'] ;

    public function render() {
        $posts = collect([]) ;

        // Post de usuarios a los que sigue
        $followers = User::find(Auth::user()->id_user)->followings()->get() ;
        foreach ($followers as $follower) {
            foreach ($follower->posts()->get() as $followerPost) {
                $posts->add($followerPost) ;
            }
        }
        // Repost de usuarios a los que sigue
        foreach ($followers as $follower) {
            foreach ($follower->reposts()->get() as $followerPost) {
                $posts->add($followerPost) ;
            }
        }
        // Likes de usuarios a los que sigue
        foreach ($followers as $follower) {
            foreach ($follower->likes()->get() as $followerPost) {
                $posts->add($followerPost) ;
            }
        }

        // Posts propios
        $userPosts = User::find(Auth::user()->id_user)->posts()->get() ;
        foreach ($userPosts as $userPost) {
            $posts->add($userPost) ;
        }

        $posts = $posts->sortByDesc('created_at')->take($this->loadAmount) ;

        return view('components.home-component', compact('posts'));
    }

    public function incrementLoadAmount () {
        $this->loadAmount += 10 ;
        $this->emit('paginateHome') ;
    }
}
