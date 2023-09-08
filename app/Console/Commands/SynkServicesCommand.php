<?php

namespace App\Console\Commands;

use App\Services\WarehouseService;
use Illuminate\Console\Command;

class SynkServicesCommand extends Command
{
    public function __construct( protected readonly WarehouseService $warehouseService)
    {
        parent::__construct();
    }

    protected $signature = 'app:sync';

    protected $description = 'Command description';

    public function handle()
    {
        $result = $this->warehouseService->services();
    }
}
