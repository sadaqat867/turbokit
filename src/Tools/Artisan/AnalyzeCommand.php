<?php

namespace SmartCode\TurboKit\Tools\Artisan;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AnalyzeCommand extends Command
{
    protected $signature = 'turbo:analyze';
    protected $description = 'Check for slow queries using MySQL slow log';

    public function handle()
    {
        $this->info("🔎 Analyzing slow queries...");

        $result = DB::select("SHOW VARIABLES LIKE 'slow_query_log'");
        if (!$result || $result[0]->Value !== 'ON') {
            $this->warn("⚠️ Slow query log is not enabled. Enable it in your MySQL config.");
            return;
        }

        $this->info("✅ Slow query log is active. Check your MySQL slow log file for details.");
        $this->line("   💡 Tip: Use TurboQuery::cache() to reduce slow queries.");
    }
}
  
