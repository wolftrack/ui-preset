<?php

namespace Wolftrack\Ui\Presets;

use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class WolftrackPreset extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateStyles();
        static::updateAssets();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    public static function installAuth()
    {
        if(!Str::contains(file_get_contents(base_path('routes/web.php')), "Auth::routes();")) {
            file_put_contents(
                base_path('routes/web.php'),
                "\nAuth::routes();\n",
                FILE_APPEND
            );
        }

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/views', resource_path('views'));
    }

    protected static function updatePackageArray(array $packages)
    {
        return [
            'tailwindcss' => '^1.0',
            'laravel-mix-purgecss' => '^4.0',
        ] + $packages;
    }

    protected static function updateStyles()
    {
        tap(new Filesystem(), function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('sass'));
            $filesystem->delete(public_path('js/app.js'));
            $filesystem->delete(public_path('css/app.css'));

            if (! $filesystem->isDirectory($directory = resource_path('css'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__.'/../stubs/resources/css/app.css', resource_path('css/app.css'));
    }

    private static function updateAssets()
    {
        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/public/images', public_path('images'));
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/../stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}
