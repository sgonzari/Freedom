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
        'user.username' => 'required|max:15',
        'user.description' => 'required|max:255',
        'user.birthday' => 'required',
    ] ;

    public function updated ($field) {
        $this->validateOnly($field, [   'user.name' => 'required|max:50',
                                        'user.username' => 'required|max:15',
                                        'user.description' => 'max:250',
                                        'image' => 'image|max:2048']) ;
    }

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
        if ($this->image) {
            $this->validate(['image' => 'image|max:2048']) ;

            $this->user->profile_image = $this->image->store('users') ;
        }

        $this->validate(['user.name' => 'required|max:50']) ;
        $this->validate(['user.username' => 'required|max:15']) ;
        $this->validate(['user.description' => 'max:255']) ;

        if ($this->user->save()) {
            $this->reset('profileModal') ;
            $this->emit('renderProfile') ;
            $this->emit('renderHeaderProfile') ;
            $this->emit('renderPinPost') ;
            $this->emit('renderPost') ;
        }
    }
}
