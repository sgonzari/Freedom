<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileEdit extends Component
{
    public $profileModal = false ;
    
    public function render()
    {
        return view('components.profile-edit');
    }
}
