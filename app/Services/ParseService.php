<?php

namespace App\Services;

use App\Jobs\ParseJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Throwable;

class ParseService
{
    public function parse(array $data)
    {
        $jobList = [];
        foreach ($data as $item) {
            Log::debug($item);
            $jobList[] = new ParseJob($item);
        }

        $batch = Bus::batch($jobList)->before(function (Batch $batch) {
            // The batch has been created but no jobs have been added...
        })->progress(function (Batch $batch) {
            // A single job has completed successfully...
        })->then(function (Batch $batch) {
           Log::debug('success');
        })->catch(function (Batch $batch, Throwable $e) {
            report($e);
        })->finally(function (Batch $batch) {
            (new AdminMailService())->sendAdminMail(id: $batch->id, success: !$batch->hasFailures());
        })->dispatch();

        return $batch->id;
    }
}
