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
                            'delete' => 'delete'] ;

    public function render() {
        $posts = [] ;

        $userPosts = $this->user->posts()->get() ;
        foreach ($userPosts as $userPost) {
            array_push($posts, $userPost) ;
        }

        return view('components.post-user', compact("posts"));
    }

    public function delete (Post $post) {
        if ((Auth::user()->id_user == $post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            $post->delete() ;
        }
    }
}
