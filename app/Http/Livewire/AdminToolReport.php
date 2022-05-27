<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Report;
use Livewire\Component;

class AdminToolReport extends Component
{
    public $query ; 

    protected $listeners = ['renderReport' => 'render'];

    public function render()
    {
        $reports = Report::whereHas('user', function ($query) {
            $query->where('username', 'like', '%'. $this->query. '%')->orWhere('name', 'like', '%'. $this->query. '%');
        })->orWhere('reason', 'like', '%'. $this->query. '%')->orderBy('created_at')->get() ;

        return view('components.admin-tool-report', compact(['reports']));
    }
}
