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

    public function render()
    {
        return view('components.admin-tool-statistic');
    }

    public function updatedOptionSelected () {
        $year = ($this->year) ? $this->year : date("Y") ;

        switch ($this->optionSelected) {
            case 'users':
                $info = [   'users' => ['data' => User::whereYear('created_at', $year)->get(), 'color' => '#ff0000'], 
                            'notificatons' => ['data' => Notification::whereYear('created_at', $year)->get(), 'color' => '#00ff00'], 
                            'warnings' => ['data' => Notification::whereYear('created_at', $year)->get(), 'color' => '#0000ff']] ;
                break;
            case 'posts':
                $info = [ 'posts' => ['data' => Post::whereYear('created_at', $year)->get(), 'color' => '#ff0000']] ;
                break;
            default:
                $info = [] ;
                break;
        }
        $this->emit('graphLoader', $info) ;
    }
}
