<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminToolWarning extends Component
{
    public $query ;

    protected $listeners = ['render' => 'render'] ;

    public function render()
    {
        $users = User::where('username', 'like', '%'. $this->query. '%')->orWhere('name', 'like', '%'. $this->query. '%')->orderBy('username')->get() ;

        return view('components.admin-tool-warning', compact(['users']));
    }
}
