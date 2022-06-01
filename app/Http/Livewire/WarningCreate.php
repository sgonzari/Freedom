<?php

namespace App\Http\Livewire;

use App\Models\Warning;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WarningCreate extends Component
{
    public $interfaceWarning = false ;
    public $user, $message ;

    protected $listeners = ['renderWarning' => 'render'] ;

    public function updated ($field) {
        $this->validateOnly($field, [   'message' => 'max:255']) ;
    }

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.warning-create', compact(['user']));
    }

    public function openModalWarning () {
        $this->interfaceWarning = true ;
        $this->emit('AutoresizeTextarea') ;
    }

    public function storeWarning () {
        if ((!is_null($this->message)) AND ($this->user->warnings()->count() < 3)) {
            $this->validate(['message' => 'max:255']) ;

            $warning = new Warning() ;
            $warning->fk_admin = Auth::user()->id_user ;
            $warning->fk_user = $this->user->id_user ;
            $warning->reason = $this->message ;

            if ($warning->save()) {
                if ($this->user->warnings()->count() >= 3) {
                    $this->user->banned = 1 ;
                    $this->user->save() ;
                }
                $this->reset(['message']) ;
            }
        }
        $this->emit('render') ;
        $this->emit('renderWarning') ;
    }
}
