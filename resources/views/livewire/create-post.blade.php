<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit="create">
        {{ $this->form }}

        <x-filament::button wire:click="submitForm" size="lg" class="mt-2">
            Create
        </x-filament::button>
    </form>
</div>