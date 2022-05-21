<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInfo extends Component
{
    public $user, $option ;

    public function render()
    {
        $user = $this->user ;
        $option = $this->option ;

        return view('components.profile-info', compact(['user', 'option']));
    }

    public function followUser () {
        if (!Auth::user()->followings()->find($this->user->id_user)) {
            Auth::user()->followings()->attach($this->user) ;
            
            Notification::create([
                'fk_user' => Auth::user()->id_user,
                'fk_notifier' => $this->user->id_user,
                'fk_typeNot' => 5
            ]);
        }
    }
    public function unfollowUser () {
        if (Auth::user()->followings()->find($this->user->id_user)) {
            Auth::user()->followings()->detach($this->user) ;

            Notification::where('fk_typeNot', 5)->where('fk_user', Auth::user()->id_user)->where('fk_notifier', $this->user->id_user)->delete() ;
        }
    }
}
