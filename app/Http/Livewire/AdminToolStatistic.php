<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Livewire\Component;

class AdminToolStatistic extends Component
{
    public $optionSelected ;
    public $options = ['users', 'posts'] ;

    public function render()
    {
        return view('components.admin-tool-statistic');
    }

    public function updatedOptionSelected () {
        switch ($this->optionSelected) {
            case 'users':
                $info = User::all() ;
                break;
            case 'posts':
                $info = Post::all() ;
                break;
            default:
                $info = [] ;
                break;
        }
        $this->emit('graphLoader', $info) ;
    }
}
