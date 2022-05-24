<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowingComponent extends Component
{
    public $user ;
    public $interfaceFollowing = false ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.following-component', compact(['user']));
    }
}
