<x-filament::page>
    {{ $this->form }}
    <title>{{ $siteName }}</title>

    <x-filament::button wire:click="save" class="mt-4">
        Save Settings
    </x-filament::button>
</x-filament::page>
