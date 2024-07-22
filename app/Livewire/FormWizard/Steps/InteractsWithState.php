<?php

namespace App\Livewire\FormWizard\Steps;

use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Modelable;
use Livewire\Form;

trait InteractsWithState
{
    /** @var Collection<int, ?Form> */
    #[Modelable]
    public Collection $state;

    #[Locked]
    public int $stateIndex;

    public function getLocalState(): ?Form
    {
        return $this->state->get($this->stateIndex);
    }
}
