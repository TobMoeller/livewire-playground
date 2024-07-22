<?php

namespace App\Livewire\FormWizard\Steps;

use App\Livewire\FormWizard\Forms\Step2Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Step2 extends Component implements StepContract
{
    use InteractsWithState;

    public function render(): View
    {
        return view('livewire.form-wizard.steps.step2');
    }

    public static function form(): ?string
    {
        return Step2Form::class;
    }

    public static function label(): string
    {
        return __('Step :number', ['number' => '2']);
    }
}
