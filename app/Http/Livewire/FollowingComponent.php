<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowingComponent extends Component
{
    public $user ;
    public $interfaceFollowing = false ;

    protected $listeners = ['renderFollowing' => 'render'] ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.following-component', compact(['user']));
    }

    public function closeFollowingModal () {
        $this->reset('interfaceFollowing') ;
        $this->emit('renderFollowing') ;
        $this->emit('renderFollower') ;
    }
}
