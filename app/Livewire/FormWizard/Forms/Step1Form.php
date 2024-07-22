<?php

namespace App\Livewire\FormWizard\Forms;

use App\Enums\TestEnum;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Step1Form extends Form
{
    #[Validate(as: 'Test 1 Field')]
    public string $test1;

    #[Validate(as: 'Enum 1 Field')]
    public TestEnum $enum1;

    public function rules(): array
    {
        return [
            'test1' => ['required', 'string', 'max:5'],
            'enum1' => ['required', Rule::enum(TestEnum::class)],
        ];
    }
}
