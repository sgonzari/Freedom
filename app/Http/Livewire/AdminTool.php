<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminTool extends Component
{
    public $option = "report" ;

    public function render()
    {
        $users = User::all() ;

        return view('components.admin-tool', compact(["users"]));
    }
}
