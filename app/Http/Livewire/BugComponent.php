<?php

namespace App\Http\Livewire;

use App\Models\Bug;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BugComponent extends Component
{
    public $interfaceBug = false ;
    public $textBug ;

    public function updated ($field) {
        $this->validateOnly($field, ['textBug' => 'max:255']) ;
    }

    public function render()
    {
        return view('components.bug-component');
    }

    public function openModalBug () {
        $this->interfaceBug = true ;
        $this->emit('AutoresizeTextarea') ;
    }

    public function store () {
        if ($this->textBug) {
            $this->validate(['textBug' => 'max:255']) ;

            $bug = new Bug() ;
            $bug->fk_user = Auth::user()->id_user ;
            $bug->text = $this->textBug ;

            if ($bug->save()) {
                $this->reset('textBug') ;
                $this->reset('interfaceBug') ;
            }
        }
    }
}
