<?php

namespace App\Http\Livewire;

use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WarningViewUser extends Component
{
    public $warningUser = true ;

    public function render()
    {
        return view('components.warning-view-user');
    }

    public function warningsOpened (Request $request) {
        foreach (Auth::user()->warnings()->get()->where("opened", false) as $warning) {
            $warning->opened = true ;
            $warning->save() ;
        }

        if (Auth::user()->warnings()->count() >= 3) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } else {
            $this->warningUser = false ;
        }
    }
}
