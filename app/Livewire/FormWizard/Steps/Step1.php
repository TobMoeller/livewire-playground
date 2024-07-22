<?php

namespace App\Livewire\FormWizard\Steps;

use App\Livewire\FormWizard\Forms\Step1Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Step1 extends Component implements StepContract
{
    use InteractsWithState;

    public function render(): View
    {
        return view('livewire.form-wizard.steps.step1');
    }

    public static function form(): ?string
    {
        return Step1Form::class;
    }

    public static function label(): string
    {
        return __('Step :number', ['number' => '1']);
    }
}
