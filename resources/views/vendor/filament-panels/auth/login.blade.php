<x-filament-panels::page.simple>
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('filament-panels::pages/auth/login.actions.register.before') }}

            {{ $this->registerAction }}
        </x-slot>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::form id="login" wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::button type="submit" form="login" class="w-full">
            {{ __('filament-panels::pages/auth/login.actions.submit.label') }}
        </x-filament-panels::button>

        <!-- ============================================================
             LIEN "MOT DE PASSE OUBLIÉ"
             ============================================================ -->
        <div style="text-align: center; margin-top: 16px; padding: 8px 0;">
            <a href="/forgot-password" 
               style="color: #4f46e5; text-decoration: none; font-size: 14px; font-weight: 500; display: inline-block;">
                ?? Mot de passe oublié ?
            </a>
        </div>
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
</x-filament-panels::page.simple>