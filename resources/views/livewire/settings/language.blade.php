<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout 
        :heading="__('Language')" 
        :subheading="__('Select the preferred language for the application')"
    >
        @php
            // Obtenemos el idioma actual desde la sesión (más confiable)
            $current = session('locale', app()->getLocale());
        @endphp

        <form 
            method="POST" 
            action="{{ route('settings.language.switch') }}" 
            x-data="{ locale: '{{ $current }}' }"
            x-ref="form"
        >
            @csrf

            <flux:radio.group variant="segmented" x-model="locale" name="locale">
                <flux:radio value="es" icon="language">{{ __('Spanish') }}</flux:radio>
                <flux:radio value="en" icon="language">{{ __('English') }}</flux:radio>
            </flux:radio.group>

            <!-- Envía el idioma seleccionado -->
            <input type="hidden" name="locale" :value="locale">

            <button type="submit" class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg">
                {{ __('Save') }}
            </button>
        </form>
    </x-settings.layout>
</section>
