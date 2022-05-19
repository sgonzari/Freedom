<?php

namespace App\Http\Livewire;

use App\Models\Warning;
use Livewire\Component;

class WarningDelete extends Component
{
    public $modal = false ;
    public $warning ;

    public function mount (Warning $warning) {
        $this->warning = $warning ;
    }
    
    public function render()
    {
        $warning = $this->warning ;
        return view('components.warning-delete', compact(['warning']));
    }
}
