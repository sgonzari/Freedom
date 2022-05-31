<?php

namespace App\Http\Livewire;

use App\Models\Bug;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BugComponent extends Component
{
    public $interfaceBug = false ;
    public $textBug ;

    public function render()
    {
        return view('components.bug-component');
    }

    public function store () {
        if ($this->textBug) {
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
