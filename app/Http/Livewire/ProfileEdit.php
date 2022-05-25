<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads ;

    public $profileModal = false ;
    public $image;
    public User $user ;

    protected $rules = [
        'image' => 'image|max:2048',
        'user.name' => 'required',
        'user.username' => 'required',
        'user.description' => 'required',
        'user.birthday' => 'required',
    ] ;

    public function mount () {
        $this->user = Auth::user() ;
    }
    
    public function render()
    {
        return view('components.profile-edit');
    }

    public function store () {
        if ($this->image) $this->user->profile_image = $this->image->store('users') ;

        if ($this->user->save()) {
            $this->reset('profileModal') ;
            $this->emit('renderProfile') ;
            $this->emit('renderHeaderProfile') ;
            $this->emit('renderPinPost') ;
            $this->emit('renderPost') ;
        }
    }
}
