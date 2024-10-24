<form wire:submit.prevent="authenticate" class="space-y-8">
    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>
</form>

<div class="mt-6">
    <p class="text-center">
        Don't have an account? <a href="{{ route('admin.register') }}" class="text-indigo-600">Register</a>
    </p>
</div>
