<?php

namespace Beier\FilamentPages;

use Beier\FilamentPages\Contracts\Renderer;
use Beier\FilamentPages\Filament\Resources\FilamentPageResource;
use Beier\FilamentPages\Renderer\SimplePageRenderer;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Features\SupportTesting\Testable;
use Filament\Panel;

class FilamentPagesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-pages';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations()
            ->hasMigration('create_filament_pages_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('pascalebeier/filament-pages');
            });
    }

    public function packageBooted(): void
    {
        $this->bindRenderer();
    }

    protected function bindRenderer(): void
    {
        $this->app->bind(Renderer::class, function ($app) {
            return $app->make(config('filament-pages.renderer', SimplePageRenderer::class));
        });
    }
}
