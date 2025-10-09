<?php

namespace SmartCode\TurboKit\Tools\Generators;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ModelGenerator extends Command
{
    protected $signature = 'turbo:make-model {name}';
    protected $description = 'Generate an optimized model extending TurboModel';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("Models/{$name}.php");

        if (file_exists($path)) {
            $this->error("Model {$name} already exists!");
            return;
        }

        $template = <<<PHP
<?php

namespace App\Models;

use SmartCode\TurboKit\Core\TurboModel;

class {$name} extends TurboModel
{
    protected \$table = Str::snake(Str::pluralStudly('{$name}'));
}
PHP;

        file_put_contents($path, $template);
        $this->info("✅ Model {$name} created successfully with TurboModel base.");
    }
}
  
