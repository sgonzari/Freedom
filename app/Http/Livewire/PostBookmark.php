<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostBookmark extends Component
{
    protected $listeners = ['render' => 'render'] ;

    public function render()
    {
        $bookmarks = User::find(Auth::user()->id_user)->bookmarks()->get() ;

        return view('components.post-bookmark', compact("bookmarks"));
    }
}
