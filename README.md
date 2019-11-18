# ui-preset
A custom Laravel UI preset

Adds Tailwind CSS scaffolding to a new Laravel application.

## Options
The `--auth` options adds views for the default Laravel authentication routes as well. 

## Installation
Add the repository to the `composer.json` file.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/wolftrack/ui-preset"
    }
]
```

Next, run this command to add the preset to your project:

```
composer require wolftrack/ui-preset --dev
```

Finally, apply the scaffolding by running:

```
php artisan wolftrack:ui
```
