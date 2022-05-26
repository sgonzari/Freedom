<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSelect extends Component
{
    public $interfaceLanguage = false ;

    public $selectedLanguage ;

    public function render()
    {
        return view('components.language-select');
    }

    public function changeLanguage () {
        if (array_key_exists($this->selectedLanguage, Config::get('languages'))) {
            Session::put('applocale', $this->selectedLanguage);
        }
        dd(url()->current());
        return redirect(url()->current());
    }
}
