<?php

namespace App\Livewire\FormWizard;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Wizard extends Component
{
    public function render(): View
    {
        return view('livewire.form-wizard.wizard');
    }
}
