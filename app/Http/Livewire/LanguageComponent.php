<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageComponent extends Component
{
    public $interfaceLanguage = false ;

    public $selectedLanguage ;

    public function mount () {
        $this->selectedLanguage = Session::get('applocale') ;
    }

    public function render()
    {
        return view('components.language-component');
    }

    public function changeLanguage () {
        if (array_key_exists($this->selectedLanguage, Config::get('languages'))) {
            Session::put('applocale', $this->selectedLanguage);
        }
        $this->reset('interfaceLanguage') ;
        return redirect(url()->previous());
    }
}
