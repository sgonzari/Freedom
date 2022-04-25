<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $content ;

    protected $listeners = ['render' => 'render'] ;

    public function render()
    {
        return view('components.create-post');
    }

    public function store () {
        Post::create([
            'fk_user' => Auth::user()->id_user,
            'content' => $this->content
        ]);

        $this->reset('content') ;

        $this->emit('render') ;
    }
}
