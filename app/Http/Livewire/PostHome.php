<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostHome extends Component
{
    protected $listeners = ['render' => 'render',
                            'addBookmark' => 'addBookmark',
                            'deletePost' => 'deletePost'] ;

    public function render() {
        $posts = [] ;

        $followers = User::find(Auth::user()->id_user)->followings()->get() ;
        foreach ($followers as $follower) {
            foreach ($follower->posts()->get() as $followerPost) {
                array_push($posts, $followerPost) ;
            }
        }
        $userPosts = User::find(Auth::user()->id_user)->posts()->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }

        // Ordena los resultados de Mayor a Menos.
        usort($posts, function($x, $y) {
            return $x['created_at'] < $y['created_at'];
        });
        
        return view('components.post-home', compact('posts'));
    }

    public function addBookmark (Post $post) {
        if (!Auth::user()->bookmarks()->find($post->id_post)) {
            Auth::user()->bookmarks()->attach($post) ;
        }
    }

    public function deletePost (Post $post) {
        if ((Auth::user()->id_user == $post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            $post->delete() ;
        }
    }
}
