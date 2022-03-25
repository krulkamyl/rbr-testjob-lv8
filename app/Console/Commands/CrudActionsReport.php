<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;

class CrudActionsReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks number of executed CRUD actions';

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
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now()->subHours(13)->subMinutes(33)->toDateTimeString();
        $this->info('Number of CRUD actions in last 13h33m: '.Activity::where('event', 'api-request')->where('created_at', '>=', $date)->count());
        return 0;
    }
}
