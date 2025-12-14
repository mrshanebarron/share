<?php

namespace MrShaneBarron\share;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\share\Livewire\share;
use MrShaneBarron\share\View\Components\share as Bladeshare;
use Livewire\Livewire;

class shareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-share.php', 'ld-share');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-share');

        Livewire::component('ld-share', share::class);

        $this->loadViewComponentsAs('ld', [
            Bladeshare::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-share.php' => config_path('ld-share.php'),
            ], 'ld-share-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-share'),
            ], 'ld-share-views');
        }
    }
}
