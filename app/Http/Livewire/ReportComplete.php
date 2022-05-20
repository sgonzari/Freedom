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
}
