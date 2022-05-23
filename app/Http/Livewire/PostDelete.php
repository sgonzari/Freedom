<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDelete extends Component
{
    public $interfaceDelete = false ;
    public $post ;

    public function render()
    {
        return view('components.post-delete');
    }

    public function deletePost () {
        if ((Auth::user()->id_user == $this->post->fk_user) OR (Auth::user()->rol->first()->id_rol > 1)) {
            if (!is_null(Notification::where('fk_post', $this->post->id_post)->get()->first())) {
                foreach (Notification::where('fk_post', $this->post->id_post)->get() as $notification) {
                    $notification->delete() ;
                }
            }
            $this->reset('interfaceDelete') ;
            $this->post->delete() ;
            $this->emit('render') ;
        }
    }
}
