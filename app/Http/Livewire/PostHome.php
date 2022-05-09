<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostHome extends Component
{
    public $post ;

    public function render()
    {
        $post = $this->post ;
        return view('components.post-home', compact(['post']));
    }
}
