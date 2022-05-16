<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostModal extends Component
{
    public Post $post ;
    public $opened = false ;

    public function render()
    {
        return view('components.post-modal');
    }
}
