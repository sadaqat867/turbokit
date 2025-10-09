<?php

namespace SmartCode\TurboKit\Traits;

trait HasChunkProcessing
{
    /**
     * Process large datasets in chunks
     */
    public function processChunks(int $chunkSize, callable $callback)
    {
        $this->chunk($chunkSize, $callback);
    }
}
  
