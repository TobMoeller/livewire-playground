<?php

namespace App\Livewire\FormWizard;

use App\Livewire\FormWizard\Steps\Step1;
use App\Livewire\FormWizard\Steps\Step2;
use App\Livewire\FormWizard\Steps\Step3;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Form;
use Str;

class Wizard extends Component
{
    /** @var Collection<int, ?Form> */
    public Collection $state;

    #[Locked]
    public int $currentStep = 0;

    #[Locked]
    public string $key;

    public function render(): View
    {
        return view('livewire.form-wizard.wizard');
    }

    public function mount(): void
    {
        $this->initializeState();
        $this->regenerateKey();
    }

    protected function initializeState(): void
    {
        $this->state = new Collection();
        foreach ($this->steps() as $index => $step) {
            if (is_subclass_of($step::form(), Form::class)) {
                $form = new ($step::form())($this, 'state.'.$index);
                // as state is owned by the wizard it has to initialize it. To keep it somewhat separated to the step component this is done in the form
                if (method_exists($form, 'mountForm')) {
                    $form->mountForm();
                }
                $this->state->push($form);
            }
        }
    }

    /**
     * @return Collection
     */
    public function steps(): Collection
    {
        return new Collection([
            Step1::class,
            Step2::class,
            Step3::class,
        ]);
    }

    protected function regenerateKey(): void
    {
        $this->key = Str::random();
    }

    public function nextStep(): void
    {
        if ($this->currentStep < $this->steps()->count()) {
            $this->regenerateKey();
            $this->state->get($this->currentStep)?->validate();
            $this->currentStep++;
        }
    }

    public function previousStep(): void
    {
        if ($this->currentStep > 0) {
            $this->regenerateKey();
            $this->currentStep--;
        }
    }

    public function setStep(int $index): void
    {
        if ($index >= 0 && $index < $this->currentStep) {
            $this->regenerateKey();
            $this->currentStep = $index;
        }
    }

    public function submit(): void
    {
        $this->regenerateKey();
        foreach ($this->state as $index => $state) {
            dump($state?->validate());
        }
    }
}
