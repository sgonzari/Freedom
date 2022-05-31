<?php

namespace App\Http\Livewire;

use App\Models\Bug;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BugComplete extends Component
{
    public $bug ;

    public function mount(Bug $bug) {
        $this->bug = $bug;
    }

    public function render()
    {
        $bug = $this->bug;
        return view('components.bug-complete', compact(['bug']));
    }

    public function completeBug () {
        $this->bug->completed = true ;
        $this->bug->fk_completedBy = Auth::user()->id_user ;
        if ($this->bug->save()) {
            $this->emit('renderBug');
        }
    }
}
