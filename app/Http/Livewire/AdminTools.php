<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminTools extends Component
{
    protected $listeners = ['render' => 'render',
                            'upRank' => 'upRank',
                            'downRank' => 'downRank'] ;

    public function render()
    {
        $users = User::all() ;

        return view('components.admin-tools', compact(["users"]));
    }

    public function upRank (User $user) {
        if ($user->fk_rol < 3) {
            switch (Auth::user()->fk_rol) {
                case 3:
                    $user->fk_rol = $user->fk_rol + 1 ;
                    $user->save() ;
                    break;
                case 2:
                    if ($user->fk_rol < 2) {
                        $user->fk_rol = $user->fk_rol + 1 ;
                        $user->save() ;
                    }
                    break;
            }
        }
    }
    public function downRank (User $user) {
        if ($user->fk_rol > 1) {
            switch (Auth::user()->fk_rol) {
                case 3:
                    $user->fk_rol = $user->fk_rol - 1 ;
                    $user->save() ;
                    break;
                case 2:
                    if ($user->fk_rol <= 2) {
                        $user->fk_rol = $user->fk_rol - 1 ;
                        $user->save() ;
                    }
                    break;
            }
        }
    }
}
