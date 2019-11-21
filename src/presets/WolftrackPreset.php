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
        static::addComposerPackages();
        static::updateStyles();
        static::updateAssets();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    public static function installAuth()
    {

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/../stubs/routes/web.php')
        );

        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/resources/js/Pages', resource_path('js/Pages'));
    }

    protected static function updatePackageArray(array $packages)
    {
        return [
            'tailwindcss' => '^1.0',
            'laravel-mix-purgecss' => '^4.0',
            'vue' => '^2.5.17',
            'vue-template-compiler' => '^2.6.10',
            'portal-vue' => '^2.1.6',
            '@inertiajs/inertia' => '^0.1.7',
            '@inertiajs/inertia-vue' => '^0.1.2',
            'postcss-import' => '^12.0.1',
            'postcss-nesting' => '^7.0.1',
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
        tap(new Filesystem(), function ($filesystem) {
            if (! $filesystem->isDirectory($directory = resource_path('js/Pages'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__.'/../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/../stubs/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/../stubs/resources/js/Pages/Welcome.vue', resource_path('js/Pages/Welcome.vue'));
    }

    protected static function addComposerPackages()
    {
        $packages = [
            'inertiajs/inertia-laravel' => '^0.1.3',
        ];

        $composer = json_decode(file_get_contents(base_path('composer.json')), true);

        $composer['require'] = array_merge($composer['require'], $packages);

        file_put_contents(
            base_path('composer.json'),
            json_encode($composer, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL,
        );
    }
}
