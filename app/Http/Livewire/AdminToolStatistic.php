<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Post;
use App\Models\Warning;
use Livewire\Component;

class AdminToolStatistic extends Component
{
    public $optionSelected ;
    public $options = ['users', 'posts'] ;
    public $year ;

    protected $listeners = ['updateGraph' => 'updatedOptionSelected'] ;

    public function mount () {
        $this->year = date("Y") ;
    }

    public function render()
    {
        return view('components.admin-tool-statistic');
    }

    public function updatedOptionSelected () {
        switch ($this->optionSelected) {
            case 'users':
                $info = [   'Users creations' => ['data' => User::whereYear('created_at', $this->year)->get(), 'color' => '#ff0000'], 
                            'Notifications made' => ['data' => Notification::whereYear('created_at', $this->year)->get(), 'color' => '#00ff00'], 
                            'Warnings sent' => ['data' => Warning::whereYear('created_at', $this->year)->get(), 'color' => '#0000ff']] ;
                break;
            case 'posts':
                $info = [   'Posts creations' => ['data' => Post::whereYear('created_at', $this->year)->get(), 'color' => '#ff0000']] ;
                break;
            default:
                $info = [] ;
                break;
        }
        $this->emit('graphLoader', $info) ;
    }

    public function lessYear () {
        $this->year -= 1 ;
        $this->emit('updateGraph') ;
    }
    public function moreYear () {
        $this->year += 1 ;
        $this->emit('updateGraph') ;
    }
}
