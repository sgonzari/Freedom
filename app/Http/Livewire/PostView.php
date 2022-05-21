<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostView extends Component
{
    use WithFileUploads ;

    public $post ;
    public $user ;
    public $commentText, $commentImage ;

    protected $listeners = ['render' => 'render'] ;

    protected $rules = [
        'commentImage' => 'required|image|max:2048'
    ] ;

    public function render()
    {
        $user = $this->user ;
        $post = $this->post ;
        $comments = $post->comments()->orderBy('created_at', 'desc')->get() ;
        $fromPosts = [] ;

        if (!is_null($post->fk_post)) {
            $fk_post = $post->fk_post ;
            do {
                $upPost = Post::withTrashed()->where('id_post', $fk_post)->first() ;
                array_push($fromPosts, $upPost) ;
                $fk_post = $upPost->fk_post ;
            } while (!is_null($fk_post)) ;
            
            usort($fromPosts, function($x, $y) {
                return $x['created_at'] > $y['created_at'];
            });
        }

        return view('components.post-view', compact(["user", "post", "comments", "fromPosts"]));
    }

    public function store () {
        if ((!is_null($this->commentText)) OR (!is_null($this->commentImage))) {
            $post = new Post() ;
            $post->fk_user = Auth::user()->id_user ;
            if ($this->commentText) $post->content = $this->commentText ;
            $post->fk_post = $this->post->id_post ;
            if ($this->commentImage) $post->image = $this->commentImage->store('posts') ;
            
            if ($post->save()) {
                if (str_contains($this->commentText, "@")) {
                    $phrases = explode("@", $this->commentText) ;
                    for ($i = 1 ; $i <= count($phrases) ; $i++) {
                        if (($i == count($phrases)) OR ($i % 2 == 0)) {
                            $username = explode(" ", $phrases[$i-1]) ;
                            if (!is_null(User::where('username', $username[0])->first()) and (Auth::user()->id_user != User::where('username', $username[0])->first()->id_user)) {
                                Notification::create([
                                    'fk_user' => Auth::user()->id_user,
                                    'fk_notifier' => User::where('username', $username[0])->first()->id_user,
                                    'fk_post' => Post::all()->last()->id_post,
                                    'fk_typeNot' => 1
                                ]);
                            }
                        }
                    }
                }
    
                if (Auth::user()->id_user != $this->user->id_user) {
                    Notification::create([
                        'fk_user' => Auth::user()->id_user,
                        'fk_notifier' => $this->user->id_user,
                        'fk_post' => Post::all()->last()->id_post,
                        'fk_typeNot' => 2
                    ]);
                }
    
                $this->reset('commentText') ;
                $this->reset('commentImage') ;
                $this->emit('render') ;
                $this->emit('renderComment') ;
            }
        }
    }
}
