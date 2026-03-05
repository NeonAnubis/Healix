<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SyncDoctorProfile implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $doctorId,
    ) {}

    public function handle(): void
    {
        Log::info("Syncing doctor profile to search index", [
            'doctor_id' => $this->doctorId,
        ]);

        // In production:
        // 1. Fetch latest doctor data
        // 2. Update Elasticsearch/Algolia index
        // 3. Refresh CDN cache for profile page
        // 4. Update sitemap entry
    }
}
