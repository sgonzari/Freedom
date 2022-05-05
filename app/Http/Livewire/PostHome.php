<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostHome extends Component
{
    protected $listeners = ['render' => 'render',
                            'addBookmark' => 'addBookmark',
                            'deleteBookmark' => 'deleteBookmark',
                            'deletePost' => 'deletePost'] ;

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
        
        return view('components.post-home', compact('posts'));
    }

    public function addBookmark (Post $post) {
        if (!Auth::user()->bookmarks()->find($post->id_post)) {
            Auth::user()->bookmarks()->attach($post) ;
        }
    }
    public function deleteBookmark (Post $post) {
        if (Auth::user()->bookmarks()->find($post->id_post)) {
            Auth::user()->bookmarks()->detach($post) ;
        }
    }

    public function deletePost (Post $post) {
        if ((Auth::user()->id_user == $post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            if (!is_null(Notification::where('fk_post', $post->id_post)->get()->first())) {
                foreach (Notification::where('fk_post', $post->id_post)->get() as $notification) {
                    $notification->delete() ;
                }
            }
            $post->delete() ;
        }
    }
}
