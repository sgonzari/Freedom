<?php

namespace App\Http\Livewire;

use App\Models\Bug;
use App\Models\User;
use Livewire\Component;

class AdminToolBug extends Component
{
    public $query ; 

    protected $listeners = ['renderBug' => 'render'];

    public function render()
    {
        $bugs = Bug::whereHas('user', function ($query) {
            $query->where('username', 'like', '%'. $this->query. '%')->orWhere('name', 'like', '%'. $this->query. '%');
        })->orWhere('text', 'like', '%'. $this->query. '%')->orderBy('created_at')->get() ;

        return view('components.admin-tool-bug', compact(['bugs']));
    }
}
