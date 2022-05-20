<?php

namespace App\Http\Livewire;

use App\Models\Warning;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WarningViewUser extends Component
{
    public $warningUser = true ;

    public function render()
    {
        return view('components.warning-view-user');
    }

    public function warningsOpened () {
        foreach (Auth::user()->warnings()->get()->where("opened", false) as $warning) {
            $warning->opened = true ;
            $warning->save() ;
        }

        $this->warningUser = false ;
    }
}
