<div class="text-white">
    <section class="md:w-2/3">
        <h2 class="text-lg">
            {{ static::label() }}
        </h2>
        <div>
            <x-label for="test2" value="{{ __('Test 2 Field') }}" />
            <x-input name="test2"
                     wire:model="state.{{ $this->stateIndex }}.test2"
                     class="w-full"
                     type="text" />
            <x-input-error for="state.{{ $this->stateIndex }}.test2" />
        </div>
        <div>
            <x-label for="enum2" value="{{ __('Enum 2 Field') }}" />
            <x-select name="enum2"
                      wire:model="state.{{ $this->stateIndex }}.enum2"
                      class="w-full">
                <option value="">{{ __('Choose an enum value') }}</option>
                @foreach (App\Enums\TestEnum::cases() as $enum)
                    <option value="{{ $enum->value }}">{{ $enum->label() }}</option>
                @endforeach
            </x-select>
            <x-input-error for="state.{{ $this->stateIndex }}.enum2" />
        </div>
    </section>
</div>
