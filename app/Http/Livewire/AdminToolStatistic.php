<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
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
                $info = ['type' => 'User', 'data' => User::whereYear('created_at', $year)->get()] ;
                break;
            case 'posts':
                $info = ['type' => 'Post', 'data' => Post::whereYear('created_at', $year)->get()] ;
                break;
            default:
                $info = [] ;
                break;
        }
        $this->emit('graphLoader', $info) ;
    }
}
