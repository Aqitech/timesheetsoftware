<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HitRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hit:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hit a specific route every 30 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('http://timesheet_software.test/check_shift');
        $this->info('Route hit. Response status code: '.$response->status());
    }
}
