<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RepostStatus extends Component
{
    public $post ;

    public function render()
    {
        return view('components.repost-status');
    }

    public function addRepost () {
        if (!Auth::user()->reposts()->find($this->post->id_post)) {
            Auth::user()->reposts()->attach($this->post) ;
        }
    }
    public function deleteRepost () {
        if (Auth::user()->reposts()->find($this->post->id_post)) {
            Auth::user()->reposts()->detach($this->post) ;
        }
    }
}
