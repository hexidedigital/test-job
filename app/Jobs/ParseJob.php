<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
        Log::debug('test', $this->data);
        $secondsToWait = $this->data['secondsToWait'] ?? 0;
        if ($secondsToWait < 0) {
            throw new \RuntimeException('secondsToWait must be greater than 0');
        }
        $secondsToWait = min($secondsToWait, 120);
        $timeToWait = now()->addSeconds($secondsToWait);
        Log::debug('tests', [
            'secondsToWait' => $secondsToWait,
            'isBefore' => now()->isBefore($timeToWait),
            'now' => now()->format('H:i:s'),
            'time' => $timeToWait->format('H:i:s'),
        ]);
        while (now()->isBefore($timeToWait)) {
            Log::debug('test');
        }
    }
}
