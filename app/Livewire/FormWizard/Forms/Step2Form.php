<?php

namespace App\Livewire\FormWizard\Forms;

use App\Enums\TestEnum;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Step2Form extends Form
{
    #[Validate(as: 'Test 2 Field')]
    public string $test2;

    #[Validate(as: 'Enum 2 Field')]
    public TestEnum $enum2;

    public function rules(): array
    {
        return [
            'test2' => ['required', 'string', 'max:5'],
            'enum2' => ['required', Rule::enum(TestEnum::class)],
        ];
    }
}
