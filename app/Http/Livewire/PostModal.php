<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostModal extends Component
{
    public Post $post ;
    public $opened = false ;

    protected $listeners = ['closePostModal' => 'closeModal'] ;

    public function render()
    {
        return view('components.post-modal');
    }

    public function closeModal () {
        $this->reset('opened') ;
    }
}
