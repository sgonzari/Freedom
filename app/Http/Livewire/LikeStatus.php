<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeStatus extends Component
{
    public $post ;

    public function render()
    {
        return view('components.like-status');
    }

    public function addLike () {
        if (!Auth::user()->likes()->find($this->post->id_post)) {
            Auth::user()->likes()->attach($this->post) ;
        }
    }
    public function deleteLike () {
        if (Auth::user()->likes()->find($this->post->id_post)) {
            Auth::user()->likes()->detach($this->post) ;
        }
    }
}
