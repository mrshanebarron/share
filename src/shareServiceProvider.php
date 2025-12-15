<?php

namespace MrShaneBarron\Share;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\Share\Livewire\Share;
use MrShaneBarron\Share\View\Components\Share as BladeShare;

class ShareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-share.php', 'sb-share');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-share');

        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-share', Share::class);
        }

        $this->loadViewComponentsAs('ld', [
            BladeShare::class,
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
