<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ShiftManager;

class CheckShiftTimmingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkshifttimming:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle() {
        $entries_created = ShiftManager::createEntriesForCurrentShift();

        $this->info($entries_created . ' entries created successfully.');    
    }
}
