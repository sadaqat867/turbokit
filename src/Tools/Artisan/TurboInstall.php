<?php

namespace SmartCode\TurboKit\Tools\Artisan;

use Illuminate\Console\Command;

class TurboInstall extends Command
{
    protected $signature = 'turbo:install';
    protected $description = 'Publish TurboKit config & prepare environment';

    public function handle()
    {
        $this->info("⚙️ Installing TurboKit...");

        $this->call('vendor:publish', [
            '--provider' => "SmartCode\\TurboKit\\TurboKitServiceProvider",
            '--tag' => 'config'
        ]);

        $this->info("✅ TurboKit installed successfully!");
    }
}
 
