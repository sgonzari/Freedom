<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Search extends Component
{
    public $query ;

    public function render()
    {
        $results = User::where('username', 'like', '%' . $this->query . '%')->orWhere('name', 'like', '%' . $this->query . '%')->get() ;

        return view('components.search', compact('results'));
    }

    public function search () {
        if (!is_null($this->query)) {
            return redirect()->route("profile", ['username' => $this->query]) ;
        }
    }
}
