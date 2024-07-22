<?php

namespace App\Livewire\FormWizard\Steps;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Step3 extends Component implements StepContract
{
    use InteractsWithState;

    public function render(): View
    {
        return view('livewire.form-wizard.steps.step3');
    }

    public static function form(): ?string
    {
        return null;
    }

    public static function label(): string
    {
        return __('Step :number', ['number' => '3']);
    }
}
