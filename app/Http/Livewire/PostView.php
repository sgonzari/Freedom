<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostView extends Component
{
    public $post ;
    public $user ;
    public $contentComment ;

    public function render()
    {
        $user = $this->user ;
        $post = $this->post ;
        $comments = [] ;
        
        foreach ($post->comments()->get() as $comment) {
            array_push($comments, $comment) ;
        }

        // Ordena los resultados de Mayor a Menos.
        usort($comments, function($x, $y) {
            return $x['created_at'] < $y['created_at'];
        });

        return view('components.post-view', compact(["user", "post", "comments"]));
    }

    public function store () {
        if (!is_null($this->contentComment)) {
            Post::create([
                'fk_user' => Auth::user()->id_user,
                'content' => $this->contentComment,
                'fk_post' => $this->post->id_post
            ]) ;

            if (str_contains($this->contentComment, "@")) {
                $phrases = explode("@", $this->contentComment) ;
                for ($i = 1 ; $i <= count($phrases) ; $i++) {
                    if (($i == count($phrases)) OR ($i % 2 == 0)) {
                        $username = explode(" ", $phrases[$i-1]) ;
                        if (!is_null(User::where('username', $username[0])->first())) {
                            Notification::create([
                                'fk_user' => Auth::user()->id_user,
                                'fk_notifier' => User::where('username', $username[0])->first()->id_user,
                                'fk_post' => Post::all()->count(),
                                'fk_typeNot' => 1
                            ]);
                        }
                    }
                }
            }

            Notification::create([
                'fk_user' => Auth::user()->id_user,
                'fk_notifier' => $this->user->id_user,
                'fk_post' => Post::all()->count(),
                'fk_typeNot' => 2
            ]);

            $this->reset('contentComment') ;
        }
    }
}
