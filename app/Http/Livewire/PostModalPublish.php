<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Livewire\Component;

class PostModalPublish extends Component
{
    public Post $post;
    public $opened = false;

    public function render()
    {
        return view('components.post-modal-publish');
    }

    public function closeModal () {
        $this->emit('render') ;
        $this->opened = false ;
    }
}
