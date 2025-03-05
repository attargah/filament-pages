<?php

namespace Beier\FilamentPages;

use Beier\FilamentPages\Filament\Resources\FilamentPageResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentPagesPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-pages';
    }

    protected function getResource(): array
    {

        return [
            config('filament-pages.filament.resource', FilamentPageResource::class),
        ];
    }

    public function register(Panel $panel): void
    {
        $panel->resources($this->getResource());
    }


    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
