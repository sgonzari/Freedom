<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInfo extends Component
{
    public $user ;

    public function render()
    {
        $user = $this->user ;
        return view('components.profile-info', compact(['user']));
    }

    public function followUser () {
        if (!Auth::user()->followings()->find($this->user->id_user)) {
            Auth::user()->followings()->attach($this->user) ;
        }
    }
    public function unfollowUser () {
        if (Auth::user()->followings()->find($this->user->id_user)) {
            Auth::user()->followings()->detach($this->user) ;
        }
    }
}
