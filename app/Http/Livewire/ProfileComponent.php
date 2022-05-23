<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileComponent extends Component
{
    public User|Null $user ;
    public string $option ;

    protected $listeners = ['renderProfile' => 'render'] ;

    public function render() {
        $user = $this->user ;
        $option = $this->option ;
        $posts = [] ;

        switch ($this->option) {
            case "posts":
                $posts = $this->user->posts()->orderBy('created_at')->get() ;
                break;
            case "reposts":
                $posts = $this->user->reposts()->get() ;
                break;
            case "likes":
                $posts = $this->user->likes()->get() ;
                break;
            default:
                $posts = [] ;
                break;
        }

        return view('components.profile-component', compact(["posts", "user", "option"]));
    }
}
