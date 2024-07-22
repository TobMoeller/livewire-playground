<div class="text-white my-4">
    <section class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2">
        <h2 class="text-lg col-span-1 sm:col-span-2 lg:col-span-3 mb-4">
            {{ static::label() }}
        </h2>
        <div>
            <x-label for="test1" value="{{ __('Test 1 Field') }}" />
            <x-input name="test1"
                     wire:model="state.{{ $this->stateIndex }}.test1"
                     class="w-full"
                     type="text" />
            <x-input-error for="state.{{ $this->stateIndex }}.test1" />
        </div>
        <div>
            <x-label for="enum1" value="{{ __('Enum 1 Field') }}" />
            <x-select name="enum1"
                      wire:model="state.{{ $this->stateIndex }}.enum1"
                      class="w-full">
                <option value="">{{ __('Choose an enum value') }}</option>
                @foreach (App\Enums\TestEnum::cases() as $enum)
                    <option value="{{ $enum->value }}">{{ $enum->label() }}</option>
                @endforeach
            </x-select>
            <x-input-error for="state.{{ $this->stateIndex }}.enum1" />
        </div>
    </section>
</div>
