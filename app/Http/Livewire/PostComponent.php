<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostComponent extends Component
{
    public $post ;
    public $infoPost ;

    protected $listeners = ['renderPost' => 'render'] ;

    public function render()
    {
        $post = $this->post ;
        $infoPost = $this->infoPost ;
        
        return view('components.post-component', compact(['post', 'infoPost']));
    }
}
