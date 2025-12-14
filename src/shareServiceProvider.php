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
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-share.php', 'sb-share');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-share');

        Livewire::component('sb-share', share::class);

        $this->loadViewComponentsAs('ld', [
            Bladeshare::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-share.php' => config_path('sb-share.php'),
            ], 'sb-share-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-share'),
            ], 'sb-share-views');
        }
    }
}
