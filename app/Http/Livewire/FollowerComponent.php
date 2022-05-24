<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowerComponent extends Component
{
    public $user ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.follower-component', compact(['user']));
    }
}
