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
        'user.name' => 'required|max:50',
        'user.username' => 'required|max:50',
        'user.description' => 'required|max:255',
        'user.birthday' => 'required',
    ] ;

    public function mount () {
        $this->user = Auth::user() ;
    }
    
    public function render()
    {
        return view('components.profile-edit');
    }

    public function showProfileModal () {
        $this->profileModal = 'true' ;
        $this->emit('AutoresizeTextarea') ;
        $this->emit('validateProfileEdit') ;
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
