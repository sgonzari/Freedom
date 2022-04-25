<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostProfile extends Component
{
    
    protected $listeners = ['render' => 'render',
                            'delete' => 'delete'] ;
    
    public function render()
    {
        $posts = User::find(Auth::user()->id_user)->posts()->get() ;

        return view('components.post-profile', compact("posts"));
    }

    public function delete (Post $post) {
        $post->delete() ;
    }
}
