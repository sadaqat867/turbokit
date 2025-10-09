<?php

namespace SmartCode\TurboKit\Tools\Artisan;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OptimizeCommand extends Command
{
    protected $signature = 'turbo:optimize';
    protected $description = 'Analyze database & suggest optimizations for TurboKit';

    public function handle()
    {
        $this->info('🚀 TurboKit Optimization Report');
        $tables = DB::select('SHOW TABLE STATUS');

        foreach ($tables as $table) {
            $this->line("📦 Table: {$table->Name}");
            $this->line("   Rows: {$table->Rows} | Engine: {$table->Engine}");

            if ($table->Data_length > 50000000) {
                $this->warn("   ⚠️ Consider indexing large columns on {$table->Name}");
            }
        }

        $this->info("\n✅ Optimization scan complete!");
    }
}
  
