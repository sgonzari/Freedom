<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostNotification extends Component
{
    public function render()
    {
        $notifications = [] ;

        foreach (Auth::user()->notifications()->get() as $notification) {
            array_push($notifications, $notification) ;
        }

        foreach (Auth::user()->notifications()->get()->where("watched", false) as $notification) {
            $notification->watched = true ;
            $notification->save() ;
        }

        return view('components.post-notification', compact("notifications"));
    }
}
