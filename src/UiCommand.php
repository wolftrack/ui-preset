<?php

namespace Wolftrack\Ui;

use Illuminate\Console\Command;
use Wolftrack\Ui\Presets\WolftrackPreset;

class UiCommand extends Command
{
    /**
     * The console command signature
     *
     * @var string
     */
    protected $signature = 'wolftrack:ui
                    { --auth : Install authentication UI scaffolding }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the wolftrack UI scaffolding for the application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        WolftrackPreset::install();

        if ($this->option('auth')) {
            WolftrackPreset::installAuth();
        }

        $this->info('Tailwind CSS scaffolding installed successfully.');
        $this->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
