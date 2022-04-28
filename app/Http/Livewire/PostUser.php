<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostUser extends Component
{
    public User $user ;

    protected $listeners = ['render' => 'render',
                            'deletePost' => 'deletePost'] ;

    public function render() {
        $posts = [] ;

        $userPosts = $this->user->posts()->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }

        usort($posts, function($x, $y) {
            return $x['created_at'] < $y['created_at'];
        });

        return view('components.post-user', compact("posts"));
    }

    public function deletePost (Post $post) {
        if ((Auth::user()->id_user == $post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            $post->delete() ;
        }
    }

    public function follow (User $user) {
    }

    public function unfollow (User $user) {
    }
}
