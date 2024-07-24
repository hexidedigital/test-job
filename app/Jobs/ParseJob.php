<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ParseJob implements ShouldQueue
{
    use Queueable;
    use Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected array  $data)
    {
//        $this->data = $data;
        Log::debug('test', $this->data);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $secondsToWait = $this->data['secondsToWait'] ?? 0;
        if ($secondsToWait < 0) {
            throw new \RuntimeException('secondsToWait must be greater than 0');
        }
        $secondsToWait = min($secondsToWait, 30);
        $timeToWait = now()->addSeconds($secondsToWait);
        while (now()->isBefore($timeToWait)) {
            Log::debug('test');
        }
    }
}
