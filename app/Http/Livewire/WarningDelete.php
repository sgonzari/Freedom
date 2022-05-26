<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Warning;
use Livewire\Component;

class WarningDelete extends Component
{
    public $modal = false ;
    public $warning ;
    public User $user ;

    public function mount (Warning $warning) {
        $this->warning = $warning ;
    }
    
    public function render()
    {
        $warning = $this->warning ;
        return view('components.warning-delete', compact(['warning']));
    }

    public function deleteWarning () {
        if ($this->warning->delete()) {
            if ($this->warning->user()->first()->banned == 1) {
                $this->user = $this->warning->user()->first() ;
                $this->user->banned = 0 ;
                $this->user->save();
            }
            $this->reset('modal') ;
            $this->emit('render') ;
            $this->emit('renderWarning') ;
        }
    }
}
