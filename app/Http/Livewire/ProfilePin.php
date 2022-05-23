<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfilePin extends Component
{
    public $user ;

    public function render()
    {
        $user = $this->user ;
        $post = $user->posts()->where('pinged', 1)->first() ;
        return view('components.profile-pin', compact(['user', 'post']));
    }
}
