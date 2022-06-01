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
        $infoPost = [] ;

        $followings = Auth::user()->followings()->get() ;
        foreach ($followings as $following) {
            foreach ($following->reposts()->get() as $followingRepost) {
                $posts->add($followingRepost) ;
                $infoPost[$followingRepost->id_post] = 'repost' ;
            }
            foreach ($following->likes()->get() as $followingLike) {
                if (!$posts->contains('id_post', $followingLike->id_post)) {
                    $posts->add($followingLike) ;
                    $infoPost[$followingLike->id_post] = 'like' ;
                }
            }
            foreach ($following->posts()->get() as $followingPost) {
                if (!$posts->contains('id_post', $followingPost->id_post)) $posts->add($followingPost) ;
            }
        }

        foreach (Auth::user()->posts()->get() as $userPost) {
            if (!$posts->contains('id_post', $userPost->id_post)) $posts->add($userPost) ;
        }

        $posts = $posts->sortByDesc('created_at')->take($this->loadAmount) ;

        return view('components.home-component', compact(['posts', 'infoPost']));
    }

    public function incrementLoadAmount () {
        $this->loadAmount += 10 ;
        $this->emit('likeSound') ;
    }
}
