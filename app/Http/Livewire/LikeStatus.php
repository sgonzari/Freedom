<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeStatus extends Component
{
    public $post ;

    protected $listeners = ['renderLike' => 'render'] ;

    public function render()
    {
        return view('components.like-status');
    }

    public function addLike () {
        if (!Auth::user()->likes()->find($this->post->id_post)) {
            Auth::user()->likes()->attach($this->post) ;

            if (Auth::user()->id_user != $this->post->user()->first()->id_user) {
                Notification::create([
                    'fk_user' => Auth::user()->id_user,
                    'fk_notifier' => $this->post->user()->first()->id_user,
                    'fk_post' => $this->post->id_post,
                    'fk_typeNot' => 4
                ]);
            }
        }
    }
    public function deleteLike () {
        if (Auth::user()->likes()->find($this->post->id_post)) {
            Auth::user()->likes()->detach($this->post) ;
        }
    }
}
