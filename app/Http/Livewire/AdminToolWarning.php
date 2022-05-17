<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminToolWarning extends Component
{
    protected $listeners = ['render' => 'render'] ;

    public function render()
    {
        $users = User::all() ;

        return view('components.admin-tool-warning', compact(['users']));
    }
}
