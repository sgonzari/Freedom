<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowerComponent extends Component
{
    public $user ;
    public $interfaceFollower = false ;

    protected $listeners = ['renderFollower' => 'render'] ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.follower-component', compact(['user']));
    }

    public function closeFollowerModal () {
        $this->reset('interfaceFollower') ;
        $this->emit('renderFollowing') ;
        $this->emit('renderFollower') ;
    }
}
