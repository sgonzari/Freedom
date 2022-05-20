<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class AdminToolReport extends Component
{
    public function render()
    {
        $reports = Report::all() ;

        return view('components.admin-tool-report', compact(['reports']));
    }
}
