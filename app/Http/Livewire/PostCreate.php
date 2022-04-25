<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostCreate extends Component
{
    public $content ;

    public function render()
    {
        return view('components.post-create');
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
