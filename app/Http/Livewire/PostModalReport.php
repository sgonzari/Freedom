<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostModalReport extends Component
{
    public $interfaceReport = false ;
    public $post ;
    public $reason ;

    public function mount (Post $post) {
        $this->post = $post ;
    }

    public function render()
    {
        $post = $this->post ;
        return view('components.post-modal-report', compact(['post']));
    }

    public function openModalReport () {
        $this->interfaceReport = true ;
        $this->emit('AutoresizeTextarea') ;
    }

    public function reportPost () {
        if ($this->reason) {
            $report = new Report () ;
            $report->fk_user = Auth::user()->id_user ;
            $report->fk_post = $this->post->id_post ;
            $report->reason = $this->reason ;

            if ($report->save()) {
                $this->reset('reason') ;
                $this->reset('interfaceReport') ;
                $this->emit('closePostModal') ;
            }
        }
    }
}
