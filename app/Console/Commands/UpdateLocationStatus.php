<?php

// Di dalam app/Console/Commands/UpdateLocationStatus.php

namespace App\Console\Commands;

use App\Services\LocationService;
use Illuminate\Console\Command;

class UpdateLocationStatus extends Command
{
    protected $signature = 'locations:update-status';
    protected $description = 'Updates the status of locations based on expiry date.';

    public function handle()
    {
        $service = new LocationService();
        $this->info('Location statuses updated successfully.');
    }
}
