<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImageComponent extends Component
{
    public $interfaceImage = false ;
    public $post ;

    public function render()
    {
        $post = $this->post ;
        $user = $post->user()->first() ;
        
        return view('components.image-component', compact(['post', 'user']));
    }

    public function openModalImage () {
        $this->interfaceImage = true ;
        $this->emit('likeSound') ;
    }

    public function closeModalImage () {
        $this->interfaceImage = false ;
        $this->emit('renderLike') ;
    }
}
