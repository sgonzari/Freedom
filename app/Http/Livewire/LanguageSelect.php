<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LanguageSelect extends Component
{
    public $interfaceLanguage = false ;

    public $lang ;

    public function render()
    {
        return view('components.language-select');
    }

    public function changeLanguage () {
        
    }
}
