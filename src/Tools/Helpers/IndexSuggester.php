<?php

namespace SmartCode\TurboKit\Tools\Helpers;

use Illuminate\Support\Facades\DB;

class IndexSuggester
{
    /**
     * Suggest indexes for large tables based on column cardinality
     */
    public static function suggestIndexes(string $table)
    {
        $columns = DB::select("SHOW COLUMNS FROM {$table}");
        $suggestions = [];

        foreach ($columns as $column) {
            if (str_contains(strtolower($column->Type), 'int')) {
                $count = DB::table($table)->distinct($column->Field)->count();
                $rows = DB::table($table)->count();
                if ($count / max($rows,1) > 0.2) { // high cardinality
                    $suggestions[] = $column->Field;
                }
            }
        }

        return $suggestions;
    }
}
  
