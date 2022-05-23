<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostModalPin extends Component
{
    public $post ;
    public $interfacePin = false ;
    public $interfaceUnpin = false ;
    
    public function render()
    {
        return view('components.post-modal-pin');
    }

    public function pinPost () {
        if ($postPinged = Post::where('fk_user', Auth::user()->id_user)->where('pinged', 1)->first()) {
            $postPinged->pinged = 0 ;
            $postPinged->save() ;
        }

        $this->post->pinged = 1 ;
        if ($this->post->save()) {
            $this->reset('interfacePin') ;
            $this->emit('closePostModal') ;
            $this->emit('renderProfile') ;
        }
    }
    public function unpinPost () {
        if ($postPinged = Post::where('fk_user', Auth::user()->id_user)->where('pinged', 1)->first()) {
            $postPinged->pinged = 0 ;

            if ($postPinged->save()) {
                $this->reset('interfaceUnpin') ;
                $this->emit('closePostModal') ;
                $this->emit('renderProfile') ;
            }
        }
    }
}
