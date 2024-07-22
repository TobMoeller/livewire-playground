<?php

namespace App\Livewire\FormWizard\Steps;

use Livewire\Form;

interface StepContract
{
    /** @return class-string<Form> */
    public static function form(): ?string;

    public static function label(): string;
}
