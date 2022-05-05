<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
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
        if (!is_null($this->content)) {
            $post = new Post() ;
            $post->fk_user = Auth::user()->id_user ;
            $post->content = $this->content ;

            if ($post->save()) {
                if (str_contains($this->content, "@")) {
                    $phrases = explode("@", $this->content) ;
                    for ($i = 1 ; $i <= count($phrases) ; $i++) {
                        if (($i == count($phrases)) OR ($i % 2 == 0)) {
                            $username = explode(" ", $phrases[$i-1]) ;
                            if (!is_null(User::where('username', $username[0])->first())) {
                                Notification::create([
                                    'fk_user' => Auth::user()->id_user,
                                    'fk_notifier' => User::where('username', $username[0])->first()->id_user,
                                    'fk_post' => Post::withTrashed()->count(),
                                    'fk_typeNot' => 1
                                ]);
                            }
                        }
                    }
                }
        
                $this->reset('content') ;
                
                $this->emit('render') ;
            }
        }
    }
}
