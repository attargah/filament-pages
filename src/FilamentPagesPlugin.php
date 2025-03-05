<?php

namespace Beier\FilamentPages;

use Beier\FilamentPages\Filament\Resources\FilamentPageResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentPagesPlugin implements Plugin
{

    protected array $beforePrimaryColumnSchema = [];
    protected array $afterPrimaryColumnSchema = [];

    protected array $beforeSecondaryColumnSchema = [];
    protected array $afterSecondaryColumnSchema = [];

    public function setBeforePrimaryColumnSchema($array): static
    {
        $this->beforePrimaryColumnSchema = $array;
        return $this;
    }

    public function setAfterPrimaryColumnSchema($array): static
    {
        $this->afterPrimaryColumnSchemaPrimaryColumnSchema = $array;
        return $this;
    }

    public function seeBeforeSecondaryColumnSchema($array): static
    {
        $this->beforeSecondaryColumnSchema = $array;
        return $this;
    }

    public function setAfterSecondaryColumnSchema($array): static
    {
        $this->afterSecondaryColumnSchema = $array;
        return $this;
    }

    public function getBeforePrimaryColumnSchema(): array
    {
        return $this->beforePrimaryColumnSchema;
    }

    public function getAfterPrimaryColumnSchema(): array
    {
        return $this->afterPrimaryColumnSchema;
    }

    public function getBeforeSecondaryColumnSchema(): array
    {

        return $this->beforeSecondaryColumnSchema;
    }

    public function getAfterSecondaryColumnSchema(): array
    {
        return $this->afterSecondaryColumnSchema;
    }


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
