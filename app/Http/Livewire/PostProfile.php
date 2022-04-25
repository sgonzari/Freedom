<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostProfile extends Component
{
    
    protected $listeners = ['render' => 'render'] ;
    
    public function render()
    {
        $posts = User::find(Auth::user()->id_user)->posts()->get() ;

        return view('components.post-profile', compact("posts"));
    }
}
