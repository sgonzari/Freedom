<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowComponent extends Component
{
    public $user ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.follow-component', compact(['user']));
    }
}
