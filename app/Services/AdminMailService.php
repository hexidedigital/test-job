<?php

namespace App\Services;

use App\Mail\JobQueueFinished;
use Illuminate\Support\Facades\Mail;

class AdminMailService
{
    public function sendAdminMail(string $id, bool $success = true): void
    {
        Mail::to('admin@admin.com')->send(new JobQueueFinished(batchId: $id, isSuccessful: $success));
    }
}
