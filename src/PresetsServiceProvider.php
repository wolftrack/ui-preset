<?php

namespace Wolftrack\Ui;

use Illuminate\Support\ServiceProvider;
use Wolftrack\Ui\Presets\WolftrackPreset;
use Illuminate\Contracts\Support\DeferrableProvider;

class PresetsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {

    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UiCommand::class,
            ]);
        }
    }

    public function provides()
    {
        return [
            UiCommand::class,
        ];
    }
}
