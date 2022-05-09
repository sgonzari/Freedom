<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileComponent extends Component
{
    public User|Null $user ;

    public function render() {
        $user = $this->user ;
        $posts = [];
        
        if (!is_null($user)) {
            $posts = $user->posts()->orderBy('created_at')->get() ;
        }

        return view('components.profile-component', compact(["posts", "user"]));
    }
}
