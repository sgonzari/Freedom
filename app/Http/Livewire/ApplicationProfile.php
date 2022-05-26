<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApplicationProfile extends Component
{
    protected $listeners = ['renderHeaderProfile' => 'render'] ;

    public function render()
    {
        return view('components.application-profile');
    }
}
