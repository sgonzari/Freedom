<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostModalComment extends Component
{
    public Post $post;
    public $opened, $contentComment;

    public function render()
    {
        $post = $this->post ;
        return view('components.post-modal-comment', compact(['post']));
    }

    public function store () {
        if (!is_null($this->contentComment)) {
            $post = new Post() ;
            $post->fk_user = Auth::user()->id_user ;
            $post->content = $this->contentComment ;
            $post->fk_post = $this->post->id_post ;
            
            if ($post->save()) {
                if (str_contains($this->contentComment, "@")) {
                    $phrases = explode("@", $this->contentComment) ;
                    for ($i = 1 ; $i <= count($phrases) ; $i++) {
                        if (($i == count($phrases)) OR ($i % 2 == 0)) {
                            $username = explode(" ", $phrases[$i-1]) ;
                            if (!is_null(User::where('username', $username[0])->first()) and (Auth::user()->id_user != User::where('username', $username[0])->first()->id_user)) {
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
    
                if (Auth::user()->id_user != $this->post->user()->first()->id_user) {
                    Notification::create([
                        'fk_user' => Auth::user()->id_user,
                        'fk_notifier' => $this->post->user()->first()->id_user,
                        'fk_post' => Post::withTrashed()->count(),
                        'fk_typeNot' => 2
                    ]);
                }
    
                $this->reset('contentComment') ;
                $this->emit('render') ;
                $this->opened = false ;
            }
        }
    }
}
