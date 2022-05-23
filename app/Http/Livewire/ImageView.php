<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImageView extends Component
{
    public $interfaceImage = false ;
    public $post ;

    public function render()
    {
        $post = $this->post ;
        $user = $post->user()->first() ;
        
        return view('components.image-view', compact(['post', 'user']));
    }
}
