<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookmarkStatus extends Component
{
    public $post ;

    public function render()
    {
        return view('components.bookmark-status');
    }

    public function addBookmark () {
        if (!Auth::user()->bookmarks()->find($this->post->id_post)) {
            Auth::user()->bookmarks()->attach($this->post) ;
        }
    }
    public function deleteBookmark () {
        if (Auth::user()->bookmarks()->find($this->post->id_post)) {
            Auth::user()->bookmarks()->detach($this->post) ;
        }
    }
}
