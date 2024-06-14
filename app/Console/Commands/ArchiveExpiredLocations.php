<?php

namespace App\Console\Commands;

// app/Console/Commands/ArchiveExpiredLocations.php

namespace App\Console\Commands;

use App\Services\LocationService;
use Illuminate\Console\Command;

class ArchiveExpiredLocations extends Command
{
    protected $signature = 'locations:archive-expired';
    protected $description = 'Archives expired locations to a separate table and deletes them from the main table.';

    public function handle(LocationService $service)
    {
        $service->archiveExpiredLocations();
        $this->info('Expired locations have been archived and deleted successfully.');
    }
}
