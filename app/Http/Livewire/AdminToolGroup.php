<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminToolGroup extends Component
{
    public $query ;

    protected $listeners = ['render' => 'render'] ;

    public function render()
    {
        $users = User::where('username', 'like', '%'. $this->query. '%')->orWhere('name', 'like', '%'. $this->query. '%')->orderBy('username')->get() ;

        return view('components.admin-tool-group', compact(['users']));
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
            $this->emit('render') ;
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
            $this->emit('render') ;
        }
    }
}
