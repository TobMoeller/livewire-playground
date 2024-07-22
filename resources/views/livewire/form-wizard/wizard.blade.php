<form wire:submit="submit" class="p-8 flex flex-col gap-4">
    @csrf
    <nav>
        <ol class="flex flex-row gap-4 justify-between">
            @foreach ($this->steps() as $index => $step)
                <li wire:key="{{ 'top-nav-'.$index }}" class="w-full">
                    <x-button wire:click.prevent="setStep({{$index}})" :disabled="$index >= $this->currentStep" @class(['w-full', 'disabled:opacity-100' => $index === $this->currentStep])>
                        {{ $step::label() }}
                    </x-button>
                </li>
            @endforeach
        </ol>
    </nav>
    <div>
        <livewire:dynamic-component :is="$this->steps()->get($this->currentStep)" wire:model="state" :state-index="$this->currentStep" :key="$this->key" />
    </div>
    <nav class="flex justify-between">
        <x-secondary-button wire:click.prevent="previousStep" :disabled="$this->currentStep <= 0">
            {{ __('Previous Step') }}
        </x-secondary-button>
        @if($this->currentStep < $this->steps()->count() - 1)
            <x-secondary-button wire:click.prevent="nextStep">
                {{ __('Next Step') }}
            </x-secondary-button>
        @else
            <x-button>
                {{ __('Submit') }}
            </x-button>
        @endif
    </nav>
</form>
