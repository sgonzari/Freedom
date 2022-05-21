<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class ReportComplete extends Component
{
    public $interfaceReport = false;
    public $report ;

    public function mount(Report $report) {
        $this->report = $report;
    }

    public function render()
    {
        $report = $this->report;
        $post = $report->post()->first();
        return view('components.report-complete', compact(['report', 'post']));
    }

    public function completeReport () {
        $this->report->completed = true ;
        if ($this->report->save()) {
            $this->emit('render');
        }
    }
    public function uncompleteReport () {
        $this->report->completed = false ;
        if ($this->report->save()) {
            $this->emit('render');
        }
    }

    public function closeReportModal () {
        $this->reset('interfaceReport') ;
        $this->emit('renderReport') ;
    }
}
