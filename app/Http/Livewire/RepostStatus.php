<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RepostStatus extends Component
{
    public $post ;

    public function render()
    {
        return view('components.repost-status');
    }

    public function addRepost () {
        if (!Auth::user()->reposts()->find($this->post->id_post)) {
            Auth::user()->reposts()->attach($this->post) ;

            if (Auth::user()->id_user != $this->post->user()->first()->id_user) {
                Notification::create([
                    'fk_user' => Auth::user()->id_user,
                    'fk_notifier' => $this->post->user()->first()->id_user,
                    'fk_post' => $this->post->id_post,
                    'fk_typeNot' => 3
                ]);
            }
        }
    }
    public function deleteRepost () {
        if (Auth::user()->reposts()->find($this->post->id_post)) {
            Auth::user()->reposts()->detach($this->post) ;

            if (Notification::where('fk_post', $this->post->id_post)->where('fk_user', Auth::user()->id_user)->where('fk_typeNot', 3)->count() > 0) {
                Notification::where('fk_post', $this->post->id_post)->where('fk_user', Auth::user()->id_user)->where('fk_typeNot', 3)->delete() ;
            }
        }
    }
}
