<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostBookmark extends Component
{
    protected $listeners = ['render' => 'render',
                            'deleteBookmark' => 'deleteBookmark',
                            'deletePost' => 'deletePost'] ;

    public function render()
    {
        $bookmarks = [] ;

        foreach (User::find(Auth::user()->id_user)->bookmarks()->get() as $bookmark) {
            array_push($bookmarks, $bookmark) ;
        }

        return view('components.post-bookmark', compact("bookmarks"));
    }

    public function deleteBookmark (Post $post) {
        if (Auth::user()->bookmarks()->find($post->id_post)) {
            Auth::user()->bookmarks()->detach($post) ;
        }
    }

    public function deletePost (Post $post) {
        if ((Auth::user()->id_user == $post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            $post->delete() ;
        }
    }
}
