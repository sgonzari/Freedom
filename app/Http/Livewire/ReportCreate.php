<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportCreate extends Component
{
    public $interfaceWarning = false ;
    public $user, $message ;

    public function mount (User $user) {
        $this->user = $user ;
    }

    public function render()
    {
        $user = $this->user ;
        return view('components.report-create', compact(['user']));
    }

    public function storeWarning () {
        if (!is_null($this->message)) {
            $report = new Report() ;
            $report->fk_author = Auth::user()->id_user ;
            $report->fk_user = $this->user->id_user ;
            $report->reason = $this->message ;

            if ($report->save()) {
                $this->reset(['interfaceWarning', 'message']) ;
            }
        }
    }
}
